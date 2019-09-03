<?php

    session_start();

    if(!isset($_SESSION['user'])){
        header('location: ../');
    }

    $id_alumnos=$_GET['id_alumnos'];
    $consulta=ConsultarAlumno($id_alumnos);

    function ConsultarAlumno($id_alumnos){
        include '../recursos/php/clases/Conexion.php';
        $sentencia="SELECT * FROM alumnos WHERE id_alumnos='".$id_alumnos."' ";
        $resultado=mysqli_query($conexion,$sentencia) or die (mysql_error());
        $filas=mysqli_fetch_assoc($resultado);
        return [
          $filas['id_alumnos'],
          $filas['nombre'],
          $filas['apellidop'],
          $filas['apellidom'],
          $filas['ciudad'],
          $filas['sexo'],
          $filas['edad'],
          $filas['telefono'],
          $filas['correo']
        ];
    }

?>
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
            <form id="frmAlumnMod">
                <input type="text" id="idalumnos" name="idalumnos" style="display:none;" value="<?php echo $consulta[0] ?>">
                <input type="text" name="nombre2" id="nombre2" placeholder="Nombre (s)" class="inputext_al" 
                        value="<?php echo $consulta[1] ?>"> 
                <input type="text" name="apellidop2" id="apellidop2" placeholder="Apellido Paterno" class="inputext_al"
                        value="<?php echo $consulta[2] ?>"> 
                <input type="text" name="apellidom2" id="apellidom2" placeholder="Apellido Materno" class="inputext_al"
                        value="<?php echo $consulta[3] ?>"> 
                <input type="text" name="ciudad2" id="ciudad2" placeholder="Ciudad" class="inputext_al"
                        value="<?php echo $consulta[4] ?>"> 
                <div>Sexo:
                    <label>Masculino
                        <input name="sexo2" id="sexo2" type="radio" value="Masculino" 
                            <?php echo ($consulta[5] == "Masculino" ? "checked" : "");?>>
                    </label>
                    <label>Femenino
                        <input name="sexo2" id="sexo2" type="radio" value="Femenino" 
                            <?php echo ($consulta[5] == "Femenino" ? "checked" : "");?>>
                    </label>
                </div>
                <label class="inputext_al_num">Edad:
                        <input type="number" name="edad2" id="edad2" min="18" max="70" class="inputext_al_num_2"
                            value="<?php echo $consulta[6]?>"> 
                </label>
                <input type="text" name="telefono2" id="telefono2" placeholder="Telefono" class="inputext_al"
                        value="<?php echo $consulta[7] ?>"> 
                <input type="email" name="correo2" id="correo2" placeholder="Correo" class="inputext_al"
                        value="<?php echo $consulta[8] ?>">
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
  <script src="../recursos/js/moalumno.js"></script>
</body>
</html>