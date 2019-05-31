let tabla="";

$(document).ready(function() {
   
   const DATA = new FormData();
   action = 'select';
   DATA.append('action', action);
   select(DATA);
});

function select(data) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'Controller/php/Controller/ProjectController.php', true);
    xhr.onload = function () {
      if (this.status === 200) {
         tabla = (JSON.parse(xhr.responseText));
        if (JSON.parse(xhr.responseText)== 'ERROR') {
          toastr.error('HUBO UN ERROR');
        }else{
          AgregarTabla(tabla); 
        }
      }
    }
    xhr.send(data)
  }
function AgregarTabla(q) {
	let TableForm = $('#tbody');
	let contador = 0;
	$.each(q, function(index, elemento){
		tbody = tbody+ '<tr>'
          +				  '<th>' + elemento.PROJECT_NAME + '</th>'
          +				  '<th>' + elemento.COST + '</th>'
          +				  '<th>' + elemento.CREATION_DATE + '</th>'
          +				  '<th>' + elemento.END_DATE + '</th>'
          +				  '<th>'  
          +       			  '<a href="#" class="btn btn-success btn-xs">'
          +							'<i class="fa fa-clock-o"></i>'
          +					  '</a>'
          +					  '<a href="#" class="btn btn-primary btn-xs">'
          +							'<i class="fa fa-pencil"></i>'
          +					  '</a>'
          +					  '<a href="#" class="btn btn-danger btn-xs">'
          +							'<i class="fa fa-trash-o"></i>'
          +					  '</a>'
          +				  '</th>'
          + 		   '</tr>';
          contador = contador + 1;
	});
	TableForm.append(tbody);
	toastr.success('Hay ' + contador + ' Proyectos');
}