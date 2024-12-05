<?php

require_once "modelos/Horario_Detalle.php";

class HorarioDetalleController{
    public function guardar($Dia, $Hora_entrada, $Hora_salida, $Id_horario){
      $horario = new HorarioDetalle($Dia, $Hora_entrada, $Hora_salida, $Id_horario);
      $resultado = $horario->guardar();
      if($resultado > 0){
          return "Horario guardado";
      }else{
          return "Error al guardar";
      }   
    }
}