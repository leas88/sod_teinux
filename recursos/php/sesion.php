<?php

  $usuario = $_POST['txtUsuario'];
  $pass = $_POST['txtPassword'];

  session_start();

  require_once './clases/Conexion.php';

  /**
   * Conexion a la base de datos
   */
  //$con = new Conexion('localhost','teinux','root','');
  $con = new Conexion('localhost','escuela_sodoma','root','');
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