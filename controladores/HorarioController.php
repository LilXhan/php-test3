<?php

require_once "modelos/Horario.php";

class HorarioController{
    public function guardar($Id_profesor, $Semestre){

        $contadorErrores = 0;
        $errrores = "";

        if($Id_profesor == 0 ){
            $errrores .= "Escoge un profesor <br>";
            $contadorErrores++;
        }

        if(strlen($Semestre) > 10 || strlen($Semestre) < 1 ){    
            $errrores .= "Escoge un semestre desde el 1 al 10 <br>";
            $contadorErrores++;
        }

        if($contadorErrores > 0){
            return $errrores;
        }else{
            $horario = new Horario($Id_profesor, $Semestre);
            $resultado = $horario->guardar();
            if($resultado > 0){
                return "Horario guardado";
            }else{
                return "Error al guardar";
            }
        }
    }

}