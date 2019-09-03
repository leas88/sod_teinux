<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>RegAlumno | CAD</title>
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <link rel="stylesheet" href="../recursos/css/cpanel.css">
  <link rel="stylesheet" href="../recursos/css/calumno.css">
  <link rel="stylesheet" href="../recursos/css/alert.css">
</head>
<body>
  <nav class="main-menu">
    <ul class="nav">
      <?php
        if($_SESSION['tipoUsuario'] == "Administrador"){
          echo '
              <li class="nav__item"><a href="javascript: void(0);" id="btnInicio">Inicio</a></li>
              <li class="nav__item estas"><a href="javascript: void(0);" id="btnAlumno">Alumnos</a></li>
              <li class="nav__item"><a href="javascript: void(0);">Salones</a></li> 
              <li class="nav__item"><a href="javascript: void(0);">Administrador</a></li>
          ';
        }
        else if($_SESSION['tipoUsuario'] == "Secretaria"){
          echo '
              <li class="nav__item"><a href="javascript: void(0);" id="btnInicio">Inicio</a></li>
              <li class="nav__item estas"><a href="javascript: void(0);" id="btnAlumno">Alumnos</a></li>
              <li class="nav__item"><a href="javascript: void(0);">Salones</a></li>
          ';
        }
        else if($_SESSION['tipoUsuario'] == "Profesor"){
          echo '
              <li class="nav__item"><a href="javascript: void(0);" id="btnInicio">Inicio</a></li>
              <li class="nav__item"><a href="javascript: void(0);">Salones</a></li>
          ';
        }
      ?>
      <li class="nav__item cerrar-sesion">
        <a href="javascript: void(0);" id="btnCerrarSesion">
          Cerrar Sesión
        </a>
      </li>
    </ul>
  </nav>
  <div class="contenedor_al">
    <div class="tit">REGISTRAR ALUMNO</div>
    <div class="contenedor_al_2">
            <form id="frmAlumn">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre (s)" class="inputext_al"> 
                <input type="text" name="apellidop" id="apellidop" placeholder="Apellido Paterno" class="inputext_al"> 
                <input type="text" name="apellidom" id="apellidom" placeholder="Apellido Materno" class="inputext_al"> 
                <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" class="inputext_al"> 
                <div>Sexo:
                    <label>Masculino
                        <input name="sexo" id="sexo" type="radio" value="Masculino"checked>
                    </label>
                    <label>Femenino
                        <input name="sexo" id="sexo" type="radio" value="Femenino">
                    </label>
                </div>
                <label class="inputext_al_num">Edad:
                        <input type="number" name="edad" id="edad" min="18" max="70" step="1" value="18" class="inputext_al_num_2"> 
                </label>
                <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="inputext_al"> 
                <input type="email" name="correo" id="correo" placeholder="Correo" class="inputext_al">
                <div class="boton">
                        <input type="submit" value="Enviar" class="botones">
                        <input type="reset" value="Borrar" class="botones">
                </div>
            </form>
        </div>
  </div>
  <div id="alert" class="alert">
    <p id="alertText"></p>
  </div>
  <script src="../recursos/js/cpanel.js"></script>
  <script src="../recursos/js/realumno.js"></script>
</body>
</html>