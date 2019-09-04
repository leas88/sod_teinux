<?php

  class Conexion{

    private $host;
    private $database;
    private $user;
    private $password;

    public function __construct($host, $database, $user, $password){
      $this->host = $host;
      $this->database = $database;
      $this->user = $user;
      $this->password = $password;
    }

    public function conectar(){
      try{
        $conexion = new PDO("mysql:host={$this->host};dbname={$this->database}", "{$this->user}", "{$this->password}");
        return $conexion;
      }catch (PDOException $e){
        echo 'Error al conectar: ' . $e->getMessage();
        die();
      }
    }
  }

  $hostnames="localhost";
  $databases="escuela_sodoma";
  $usernames="root";
  $passwords="";

  $conexion=mysqli_connect($hostnames,$usernames,$passwords,$databases);

?>