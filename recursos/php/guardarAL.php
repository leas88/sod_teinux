<?php
    $nombre = $_POST['nombre'];
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];
    $ciudad = $_POST['ciudad'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    include 'clases/Conexion.php';

    $insert="INSERT INTO alumnos (nombre, apellidop, apellidom, ciudad, sexo, 
    edad, telefono, correo) VALUES ('$nombre','$apellidop','$apellidom','$ciudad',
    '$sexo','$edad','$telefono','$correo')";
    $resultado_insert=mysqli_query($conexion,$insert);
    if(!$resultado_insert){
        echo json_encode('error');
    }else{
        echo json_encode('pase');
    }
    mysqli_close($conexion);
?>