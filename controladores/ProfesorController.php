<?php

require_once "modelos/Profesor.php";

class ProfesorController{
    public function guardar($Dni, $Nombres, $Apellidos){


        $contadorErrores = 0;
        $errrores = "";

        if(trim($Nombres) == ""){
            $errrores .= "El username no puede estar vacio <br>";
            $contadorErrores++;
        }

        if(strlen($Dni) != 8){    
            $errrores .= "El Dni debe tener 8 numeros y no puede estar vacio <br>";
            $contadorErrores++;
        }

        if($contadorErrores > 0){
            return $errrores;
        }else{
            $profesor = new Profesor($Dni, $Nombres, $Apellidos);
            $resultado = $profesor->guardar();
            if($resultado > 0){
                return "Profesor guardado";
            }else{
                return "Error al guardar";
            }
        }
    }

}