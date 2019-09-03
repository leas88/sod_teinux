<?php

  session_start();

  if(!isset($_SESSION['user'])){
    header('location: ../');
  }
  else{
    require_once '../recursos/php/views/cpanel.php';
  }

?>