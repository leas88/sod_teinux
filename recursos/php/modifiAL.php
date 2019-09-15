<?php

    include 'clases/Conexion.php';
    include 'validaciones/ConfigValidation.php';
    include 'libraries/FormValidation.php';


    $idalumnos = $_POST['idalumnos'];
    $nombre = $_POST['nombre2'];
    $apellidop = $_POST['apellidop2'];
    $apellidom = $_POST['apellidom2'];
    $ciudad = $_POST['ciudad2'];
    $sexo = $_POST['sexo2'];
    $edad = $_POST['edad2'];
    $telefono = $_POST['telefono2'];
    $correo = $_POST['correo2'];

    $formValidation = new FormValidation();//Biblioteca para validar
    $formValidation->setValidaciones($alumnosVal);
    if($formValidation->run($_POST)){
        $array = ['idalumnos'=>'']; 
                $update="UPDATE alumnos SET nombre='".$nombre."', apellidop='".$apellidop."', apellidom='".$apellidom."', 
                ciudad='".$ciudad."', sexo='".$sexo."', edad='".$edad."', telefono='".$telefono."', correo='".$correo."' 
                WHERE id_alumnos='".$idalumnos."' ";
            $resultado_update = mysqli_query($conexion,$update);
            if(!$resultado_update){
                echo json_encode(array('pase'=>0));
            }else{
                echo json_encode(array('pase'=>1));
            }
            mysqli_close($conexion);
    }else{
        $formValidation->getMessagesTexts();
        $message = "";
        $separador = "";
        foreach ($formValidation->getMessagesTexts() as $key => $value) {
            $message .= $separador . $value ;
            $separador = "\n";
            //echo '<pr>' .$key . " con valor ". $value. '</pr>' ;    
        }
        $result = array('pase'=>0,'messages'=>$message);
        echo json_encode($result);
           
    }
    
    
        
?>