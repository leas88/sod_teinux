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
  $databases="id9756636_proyectofinal";
  $usernames="id9756636_es162005431";
  $passwords="ES162005431";

  $conexion=mysqli_connect($hostnames,$usernames,$passwords,$databases);

?>