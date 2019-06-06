const DATA = new FormData();
const NewProjectForm  = document.querySelector('#form');
let Tablebody = document.querySelector('#tbody');
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
	
	Tablebody.addEventListener('click', Remove);
 	NewProjectForm.addEventListener('submit', Edit);

}

function select() {
	action = 'select';
   	DATA.append('action', action);
	let table="";
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controller/php/Controller/ProjectController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
         table = (JSON.parse(xhr.responseText));
        if (JSON.parse(xhr.responseText)== 'ERROR') {
          toastr.error('HUBO UN ERROR');
        }else{
          AddTable(table); 
        }
      }
    }
    xhr.send(DATA)
  }
function AddTable(table) {
	$('#tbody tr').remove();
	let TableForm = $('#tbody');
	let tbody = "";
	let cont = 0;
	$.each(table, function(index, element){
		tbody = tbody+ '<tr">'
          +				  '<th>' + element.PROJECT_NAME + '</th>'
          +				  '<th>' + element.COST + '</th>'
          +				  '<th>' + element.CREATION_DATE + '</th>'
          +				  '<th>' + element.END_DATE + '</th>'
          +				  '<th>'  
          +					  '<a href="#" class="btn btn-primary btn-xs Edit"  value="'+element.ID+'">'
          +							'<i class="fa fa-pencil"></i>'
          +					  '</a>'
          +					  '<a href="#" class="btn btn-danger btn-xs Remove" data-id="'+ element.ID +'">'
          +							'<i class="fa fa-trash-o"></i>'
          +					  '</a>'
          +				  '</th>'
          + 		   '</tr>';
          cont = cont + 1;
	});
	TableForm.append(tbody);
	toastr.success('Hay ' + cont + ' Proyectos');
}
function Remove(e){
	let id = '';
	let action = '';
	if(e.target.parentElement.classList.contains('Remove')){
		id = e.target.parentElement.getAttribute('data-id');
		const answer = confirm('¿Seguro?');
		if (answer) {
			action = 'Remove';
			const idPost=id;
			DATA.append('action', action);
			DATA.append('ID', idPost);
			const xhr = new XMLHttpRequest();
		    xhr.open('POST', 'Controller/php/Controller/ProjectController.php', true);
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
		    xhr.send(DATA)
		}
	}
	else{
		ShowData(e);
	}
}
function ShowData(e) {
	if(e.target.parentElement.classList.contains('Edit')){
		let id = e.target.parentElement.getAttribute('value');
		let data="";
		DATA.append('ID', id);
		DATA.append('action', "ShowData");
		const xhr = new XMLHttpRequest();
		xhr.open('POST', 'Controller/php/Controller/ProjectController.php', true);
		xhr.onload = function () {
		      if (this.status === 200) {
		        if (JSON.parse(xhr.responseText) === 'ERROR') {
		          toastr.error('HUBO UN ERROR');
		        }else{
		        	data = JSON.parse(xhr.responseText);
		         	$.each(data, function(index, element){
		         		$('#IdProject').val(element.ID);
		         		$('#NameProject').val(element.PROJECT_NAME);
		         		$('#CostProject').val(element.COST);
		         		$('#StartDate').val(element.CREATION_DATE);
		         		$('#EndDate').val(element.END_DATE);
		         	});
		         	$('#EditModal').modal('toggle');
		        }
		      }
		    }
		    xhr.send(DATA)
		
	}
}
function Edit(e) {
    e.preventDefault();
    let Name = document.querySelector('#NameProject').value,
        Cost = document.querySelector('#CostProject').value,
        StartDate = document.querySelector('#StartDate').value,
        EndDate = document.querySelector('#EndDate').value,
        action = "Edit";
    
    if (Name === '' || Cost === '' || StartDate === '' || EndDate === '') {
      toastr.error('Todos los Campos son Obligatorios');
    } else {
   	  
      let id = document.querySelector('#IdProject').value;
      DATA.append('ID', id);
      DATA.append('PROJECT_NAME', Name);
      DATA.append('COST', Cost);
      DATA.append('CREATION_DATE', StartDate);
      DATA.append('END_DATE', EndDate);
      DATA.append('action', action);
      	EditDataBase(DATA);
      
    }    
}
  function EditDataBase(data) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controller/php/Controller/ProjectController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
        if (JSON.parse(xhr.responseText)== 'ERROR') {
          toastr.error('HUBO UN ERROR');
        }else{
          toastr.success('Actualizado Correctamente');
          $("#EditModal").modal("hide");
          select();
        }
      }
    }
    xhr.send(data)
  }