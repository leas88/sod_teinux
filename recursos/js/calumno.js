let btnAgregar = document.getElementById('btnAgregar');

btnAgregar.addEventListener('click', function (e){
  e.preventDefault();

  location.href = "../alumno";
});

function Confirmation() {
 
	if (confirm('¿Está seguro de eliminar el alumno?')==true) {
	    return true;
	}else{
	    return false;
	}
}