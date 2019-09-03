let btnCerrarSesion = document.getElementById('btnCerrarSesion');
let btnAlumno = document.getElementById('btnAlumno');

btnCerrarSesion.addEventListener('click', function (e){
  e.preventDefault();

  location.href = "../recursos/php/cerrarSesion.php";
});

btnAlumno.addEventListener('click', function (e){
  e.preventDefault();

  location.href = "../alum";
});

btnInicio.addEventListener('click', function (e){
  e.preventDefault();

  location.href = "../cad";
});