<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CPanel | CAD</title>
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <link rel="stylesheet" href="../recursos/css/cpanel.css">
</head>
<body>
  <nav class="main-menu">
    <ul class="nav">
      <?php

        if($_SESSION['tipoUsuario'] == "Administrador"){
          echo '
              <li class="nav__item estas"><a href="javascript: void(0);" id="btnInicio">Inicio</a></li>
              <li class="nav__item"><a href="javascript: void(0);" id="btnAlumno">Alumnos</a></li>
              <li class="nav__item"><a href="javascript: void(0);">Salones</a></li> 
              <li class="nav__item"><a href="javascript: void(0);">Administrador</a></li>
          ';
        }
        else if($_SESSION['tipoUsuario'] == "Secretaria"){
          echo '
              <li class="nav__item estas"><a href="javascript: void(0);" id="btnInicio">Inicio</a></li>
              <li class="nav__item"><a href="javascript: void(0);" id="btnAlumno">Alumnos</a></li>
              <li class="nav__item"><a href="javascript: void(0);">Salones</a></li>
          ';
        }
        else if($_SESSION['tipoUsuario'] == "Profesor"){
          echo '
              <li class="nav__item estas"><a href="javascript: void(0);" id="btnInicio">Inicio</a></li>
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
  <div>
    <img class="center" src="../recursos/imagen/teinux_menu.png" alt="logo de teinux" width="600" height="200">
  </div>
  <script src="../recursos/js/cpanel.js"></script>
</body>
</html>