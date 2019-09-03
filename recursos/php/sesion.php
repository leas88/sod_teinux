<?php

  $usuario = $_POST['txtUsuario'];
  $pass = $_POST['txtPassword'];

  session_start();

  require_once './clases/Conexion.php';

  /**
   * Conexion a la base de datos
   */
  //$con = new Conexion('localhost','teinux','root','');
  $con = new Conexion('localhost','id9756636_proyectofinal','id9756636_es162005431','ES162005431');
  $conexion = $con->conectar();
  /**
   * Consulta SQL
   */
  $sql = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
  $sql->execute(array(':usuario' => $usuario));
  /**
   * Comprobar si el usuario existe
   */
  if($registro = $sql->fetch(PDO::FETCH_ASSOC)){
    if($registro['pass'] == $pass){
      $_SESSION['user'] = $usuario;
      $_SESSION['tipoUsuario'] = $registro['tipoUsuario'];
      echo json_encode('pase');
      /*header('location: ../../cad/');*/
    }
    else{
      echo json_encode('no');
      session_destroy();
    }
  }
  else{
    echo json_encode('nel');
    session_destroy();
  }



?>