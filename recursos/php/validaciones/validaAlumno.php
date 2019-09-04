<?php
include 'libraries/Validaciones.php';

class validaAlumno{
    private $arrayData;
    private $arrayValidaciones;
    private $libValidaciones;
    
    public function __construct() {
        echo '<pr>Hola soy clase valida</pr>' ;
        $this->libValidaciones = new Validaciones();
    }
    
    public function setDatos($arrayData){
        $this->arrayData = $arrayData;
    }
    
    public function setValidaciones($arrayValidaciones){
        $this->arrayValidaciones = $arrayValidaciones;
    }
    
    public function getValidacione(){
        return "Saludos y validaciones";
    }

    public function ejecutaValidaciones(){
        $result = $this->libValidaciones->valid_email('leas.pumas@gmail');
        $resultado = $this->libValidaciones->getMessageLanguage("valid_email", "Correo electronico");
        if($result){
            echo "\n " . $resultado;
        }else{
            echo "\n " . $resultado;
        }
        
    }
}
