let frmAlumn = document.getElementById('frmAlumn');

frmAlumn.addEventListener('submit', function(e){
  e.preventDefault();

  let nombre = document.getElementById('nombre');
  let apellidop = document.getElementById('apellidop');
  let apellidom = document.getElementById('apellidom');
  let ciudad = document.getElementById('ciudad');
  let edad = document.getElementById('edad'); 
  let telefono = document.getElementById('telefono');
  let correo = document.getElementById('correo');

  if(nombre.value == "" || apellidop.value == "" || apellidom.value == ""
     || ciudad.value == "" || edad.value == "" || telefono.value == "" || correo.value == ""){
    alertNotify('warning', 'Rellena los campos para continuar.');
  }else{
    var datos = new FormData(frmAlumn);

    fetch('../recursos/php/guardarAL.php',{
      method: 'POST', body: datos
    })
        .then( res=> res.json())
        .then( data=> {
          if(data==='pase'){
            alertNotify('info', 'Datos Guardados.')
            setTimeout(function(){a()},2000)
          }else{
            alertNotify('error', 'Error al guardar.')
            setTimeout(function(){a()},2000);
          }
        })
  }
});

function alertNotify(tipo, mensaje) {
  let alertBox = document.getElementById('alert');
  let alertText = document.getElementById('alertText');

  alertBox.classList.add('show');
  alertText.innerText = mensaje;

  if(tipo == "info"){
    alertBox.classList.add('alert-info');
  }
  else if(tipo == "warning"){
    alertBox.classList.add('alert-warning');
  }
  else if(tipo == "error"){
    alertBox.classList.add('alert-error');
  }

  setTimeout(function(){
    alertBox.classList.remove('show');
  }, 3000);

  setTimeout(function(){
    alertBox.classList.remove('alert-info');
    alertBox.classList.remove('alert-warning');
    alertBox.classList.remove('alert-error');

    alertText.innerText = "";

  }, 4000);
}

function a(){
  location.href="../alum/";
}

function b(){
  location.href="./";
}