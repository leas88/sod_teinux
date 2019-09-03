<?php

    $idalumnos = $_POST['idalumnos'];
    $nombre = $_POST['nombre2'];
    $apellidop = $_POST['apellidop2'];
    $apellidom = $_POST['apellidom2'];
    $ciudad = $_POST['ciudad2'];
    $sexo = $_POST['sexo2'];
    $edad = $_POST['edad2'];
    $telefono = $_POST['telefono2'];
    $correo = $_POST['correo2'];

    include 'clases/Conexion.php';

    $update="UPDATE alumnos SET nombre='".$nombre."', apellidop='".$apellidop."', apellidom='".$apellidom."', 
        ciudad='".$ciudad."', sexo='".$sexo."', edad='".$edad."', telefono='".$telefono."', correo='".$correo."' 
        WHERE id_alumnos='".$idalumnos."' ";
    $resultado_update=mysqli_query($conexion,$update);
    if(!$resultado_update){
        echo json_encode('error');
    }else{
        echo json_encode('pase');
    }
    mysqli_close($conexion);
?>