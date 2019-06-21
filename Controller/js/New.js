const InfoNewProject = new FormData();
  eventListeners();
  function eventListeners() {
    $('#form').submit(ReadForm);
  }
  function ReadForm(e) {
    e.preventDefault();
    
    const Name = $('#NameProject').val(),
          Cost = $('#CostProject').val(),
          StartDate = $('#StartDate').val(),
          EndDate = $('#EndDate').val(),
          action = 'createProject';
    
    if (Name === '' || Cost === '' || StartDate === '' || EndDate === '') {
      toastr.error('Todos los Campos son Obligatorios');
    } else {
      
     
      InfoNewProject.append('PROJECT_NAME', Name);
      InfoNewProject.append('COST', Cost);
      InfoNewProject.append('CREATION_DATE', StartDate);
      InfoNewProject.append('END_DATE', EndDate);
      InfoNewProject.append('action', action);

      if (action === 'createProject') {
        InsertProject(InfoNewProject);
      }else{

      }
    }
  }

  function InsertProject(data) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Controller/php/Controller/ProjectController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
        if (JSON.parse(xhr.responseText)== 'ERROR') {
          toastr.error('HUBO UN ERROR');
        }else{
          toastr.success('Ingresado Correctamente');
        }
      }
    }
    xhr.send(data)
  }
  
