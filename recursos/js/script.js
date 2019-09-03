let frmLogin = document.getElementById('frmLogin');

frmLogin.addEventListener('submit', function(e){
  e.preventDefault();

  let txtUsuario = document.getElementById('txtUsuario');
  let txtPassword = document.getElementById('txtPassword');

  if(txtUsuario.value == "" || txtPassword.value == ""){
    alertNotify('warning', 'Rellena los campos para continuar.');
  }else{
    var datos = new FormData(frmLogin);
    console.log(datos)
    console.log(datos.get('txtUsuario'))
    console.log(datos.get('txtPassword'))

    fetch('recursos/php/sesion.php',{
      method: 'POST', body: datos
    })
        .then( res=> res.json())
        .then( data=> {
          console.log(data)
          if(data==='pase'){
            console.log('pasele')
            alertNotify('info', 'Bienvenido.')
            setTimeout(function(){a()},2000)
          }else{
            console.log('nel')
            alertNotify('error', 'Datos invalidos.')
            setTimeout(function(){b()},2000);
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
  location.href="cad/";
}

function b(){
  location.href="./";
}