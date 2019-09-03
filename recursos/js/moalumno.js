let frmAlumnMod = document.getElementById('frmAlumnMod');

frmAlumnMod.addEventListener('submit', function(e){
  e.preventDefault();

  let nombre = document.getElementById('nombre2');
  let apellidop = document.getElementById('apellidop2');
  let apellidom = document.getElementById('apellidom2');
  let ciudad = document.getElementById('ciudad2');
  let edad = document.getElementById('edad2'); 
  let telefono = document.getElementById('telefono2');
  let correo = document.getElementById('correo2');

  if(nombre.value == "" || apellidop.value == "" || apellidom.value == ""
     || ciudad.value == "" || edad.value == "" || telefono.value == "" || correo.value == ""){
    alertNotify('warning', 'Rellena los campos para continuar.');
  }else{
    var datos = new FormData(frmAlumnMod);
    
    fetch('../recursos/php/modifiAL.php',{
      method: 'POST', body: datos
    })
        .then( res=> res.json())
        .then( data=> {
          if(data==='pase'){
            alertNotify('info', 'Datos Modificados.')
            setTimeout(function(){a()},2000)
          }else{
            alertNotify('error', 'Error al Modificar.')
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