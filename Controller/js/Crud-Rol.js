const InfoRole = new FormData();
setInterval(function(){ select()}, 60000);
$(document).ready(function() {
   select();
   $("#search").keyup(function(){
     _this = this;
     $.each($("#table tbody tr"), function() {
       if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
       $(this).hide();
       else
       $(this).show();
     });
   });

});

  eventListeners();
  function eventListeners() {
      $('#tbody').click(Remove);
      $('#form-Edit').submit(Edit);
      $('#form').submit(ReadForm);
  }
  function ReadForm(e) {
    e.preventDefault();
    
    const Name = $('#description').val();
    
    
    if (Name === '') {
      toastr.error('Todos los Campos son Obligatorios');
    } else {
      
     
      InfoRole.append('DESCRIPTION', Name);
      InfoRole.append('action', 'createRole');
      InsertRole(InfoRole);

      
    }
  }

  function InsertRole(data) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/php/Controller/RolController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
        if (JSON.parse(xhr.responseText)== 'ERROR') {
          toastr.error('HUBO UN ERROR');
        }else{
          console.log(JSON.parse(xhr.responseText));
          select();
          toastr.success('Ingresado Correctamente');
        }
      }
    }
    xhr.send(data)
  }


function select() {
    InfoRole.append('action', 'selectRol');
    let table="";
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/php/Controller/RolController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
        if (JSON.parse(xhr.responseText)== 'ERROR') { 
          toastr.error('HUBO UN ERROR');
        }else{
          table = (JSON.parse(xhr.responseText));
          AddTable(table); 
        }
      }
    } 
    xhr.send(InfoRole)
  }

function AddTable(table) {
  $('#tbody tr').remove();
  let TableForm = $('#tbody');
  let tbody = "";
  let cont = 0;
  $.each(table, function(index, element){
    TableForm.append(tbody =  '<tr">'
          +         '<th>' + element.DESCRIPTION + '</th>'

          +         '<th>'  
          +           '<a href="#" class="btn btn-primary btn-xs Edit"  value="'+element.ID_ROLE+'">'
          +             '<i class="fa fa-pencil"></i>'
          +           '</a>'
          +           '<a href="#" class="btn btn-danger btn-xs Remove" data-id="'+ element.ID_ROLE+'">'
          +             '<i class="fa fa-trash-o"></i>'
          +           '</a>'
          +         '</th>'
          +        '</tr>');
          cont = cont + 1;
  });
  toastr.success('Il y a ' + cont + ' Rôles');
}
function Remove(e){
  if(e.target.parentElement.classList.contains('Remove')){
    let id = e.target.parentElement.getAttribute('data-id');
    const answer = confirm('¿Seguro?');
    if (answer) {
      InfoRole.append('action', 'RemoveRol');
      InfoRole.append('ID_ROLE', id);
      console.log(id);
      const xhr = new XMLHttpRequest();
        xhr.open('POST', '../Controller/php/Controller/RolController.php', true);
        xhr.onload = function () {
          if (this.status === 200) {
            if (JSON.parse(xhr.responseText)== 'ERROR') {
              toastr.error('HUBO UN ERROR');
            }else{
              e.target.parentElement.parentElement.parentElement.remove();
              toastr.success("Eliminado");
            }
          }
        }
        xhr.send(InfoRole)
    }
  }
  else{
    ShowData(e);
  }
}
function ShowData(e) {
  if(e.target.parentElement.classList.contains('Edit')){
    let id = e.target.parentElement.getAttribute('value');
    InfoRole.append('ID_ROLE', id);
    InfoRole.append('action', "ShowDataRol");
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/php/Controller/RolController.php', true);
    xhr.onload = function () {
          if (this.status === 200) {
            if (JSON.parse(xhr.responseText) === 'ERROR') {
              toastr.error('HUBO UN ERROR');
            }else{
              let data = JSON.parse(xhr.responseText);
              $.each(data, function(index, element){
                $('#IdProject').val(element.ID_ROLE);
                $('#NameProject').val(element.DESCRIPTION);
              });
              $('#EditModal').modal('toggle');
            }
          }
        }
        xhr.send(InfoRole)
    
  }
}
function Edit(e) {
    e.preventDefault();
    let Name = $('#NameProject').val();
    let id = $('#IdProject').val();
    console.log(Name); 
    console.log(id);

    
    if (Name === '' ) {
      toastr.error('Todos los Campos son Obligatorios');
    } else {
      
      
      InfoRole.append('ID_ROLE', id);
      InfoRole.append('DESCRIPTION', Name);
      InfoRole.append('action', 'EditRol');
      EditDataBase(InfoRole);
      
    }    
}
  function EditDataBase(data) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/php/Controller/RolController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
        if (JSON.parse(xhr.responseText)== 'ERROR') {
          toastr.error('HUBO UN ERROR');
        }else{
         
          $("#EditModal").modal("hide");
          select();
          toastr.success('Actualizado Correctamente');
        }
      }
    }
    xhr.send(data)
  }