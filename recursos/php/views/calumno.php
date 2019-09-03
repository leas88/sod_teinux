<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Alumnos | CAD</title>
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <link rel="stylesheet" href="../recursos/css/cpanel.css">
  <link rel="stylesheet" href="../recursos/css/calumno.css">
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
    <div class="tit">ALUMNOS INSCRITOS</div>
    <nav class="menu_al">
      <ul class="nav_al">
        <div class="serch_bar">
          <input type="text" placeholder="Buscar">
        </div>
        <li class="nav_al_item"><a href="#">Buscar</a></li>
        <li class="nav_al_item agregar"><a href="" id="btnAgregar">AGREGAR</a></li>
      </ul>
    </nav>
    <table>
      <tr>
  			<th scope="row">ID</th>
  			<th>Nombre</th>
  			<th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Ciudad</th>
        <th>Sexo</th>
        <th>Edad</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
      <?php
        include '../recursos/php/clases/Conexion.php';
        $consulta="select * from alumnos";
        $resultado=mysqli_query($conexion,$consulta);
        while($filas=mysqli_fetch_assoc($resultado)){
          echo "<tr>";
            echo "<th>"; echo $filas['id_alumnos']; echo "</th>";
            echo "<td>"; echo $filas['nombre']; echo "</td>";
            echo "<td>"; echo $filas['apellidop']; echo "</td>";
            echo "<td>"; echo $filas['apellidom']; echo "</td>";
            echo "<td>"; echo $filas['ciudad']; echo "</td>";
            echo "<td>"; echo $filas['sexo']; echo "</td>";
            echo "<td>"; echo $filas['edad']; echo "</td>";
            echo "<td>"; echo $filas['telefono']; echo "</td>";
            echo "<td>"; echo $filas['correo']; echo "</td>";
            echo "<th class='columnaEE'>
                    <a href='../alumMod/?id_alumnos=".$filas['id_alumnos']. " '> 
                      <img src='../recursos/imagen/editar.png' alt='editar' width='30' height='auto' class='botones_tabla'>
                    </a>
                  </th>";
            echo "<th class='columnaEE'>
                  <a  href='../alumElim/?id_alumnos=".$filas['id_alumnos']. " ' onclick='return Confirmation()'> 
                    <img src='../recursos/imagen/eliminar.png' alt='eliminar' width='30' height='auto' class='botones_tabla'>
                  </a>
                </th>";
          echo "</tr>";
        }
      ?>
    </table>
  </div>
  <script src="../recursos/js/cpanel.js"></script>
  <script src="../recursos/js/calumno.js"></script>
</body>
</html>