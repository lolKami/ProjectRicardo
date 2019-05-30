const NewProjectForm  = document.querySelector('#form');
  eventListeners();
  function eventListeners() {
    NewProjectForm.addEventListener('submit', ReadForm);
  }

  function ReadForm(e) {
    e.preventDefault();
    
    const Name = document.querySelector('#NameProject').value,
          Cost = document.querySelector('#CostProject').value,
          StartDate = document.querySelector('#StartDate').value,
          EndDate = document.querySelector('#EndDate').value,
          action = document.querySelector('#action').value;
    
    if (Name === '' || Cost === '' || StartDate === '' || EndDate === '') {
      Notification();
    } else {
      
      const InfoNewProject = new FormData();
      InfoNewProject.append('PROJECT_NAME', Name);
      InfoNewProject.append('COST', Cost);
      InfoNewProject.append('CREATION_DATE', StartDate);
      InfoNewProject.append('END_DATE', EndDate);
      InfoNewProject.append('action', action);

      if (action === 'create') {
        InsertDataBase(InfoNewProject);
      }else{

      }
    }
  }

  function InsertDataBase(data) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controller/php/Controller/ProjectController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
        console.log(JSON.parse(xhr.responseText));
        if (JSON.parse(xhr.responseText)== 'ERROR') {
          toastr.error('HUBO UN ERROR');
        }else{
          toastr.success('Ingresado Correctamente');
        }
      }
    }
    xhr.send(data)
  }
  function Notification() {
    toastr.error('Todos los Campos son Obligatorios');
  }

