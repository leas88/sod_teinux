<?php

    session_start();

    if(!isset($_SESSION['user'])){
        header('location: ../');
    }

    $id_alumnos=$_GET['id_alumnos'];
    include '../recursos/php/clases/Conexion.php';
    $sentencia="DELETE FROM alumnos WHERE id_alumnos='".$id_alumnos."' ";
    mysqli_query($conexion,$sentencia) or die (mysql_error());


?>
<script type="text/javascript">
	alert("Alumno Eliminado exitosamente");
	location.href='../alum';
</script>