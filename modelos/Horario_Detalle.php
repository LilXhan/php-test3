<?php

require_once "Conexion.php";

class HorarioDetalle {
    private $Dia;
    private $Hora_entrada;
    private $Hora_salida;
    private $Id_horario;

    public function __construct($Dia, $Hora_entrada, $Hora_salida, $Id_horario){
        $this->Dia = $Dia;
        $this->Hora_entrada = $Hora_entrada;
        $this->Hora_salida = $Hora_salida;
        $this->Id_horario = $Id_horario;
    }

    public function guardar(){
        $asistencia_colegio = new Conexion();
        $asistencia_colegio->abrir();

        $sql = "INSERT INTO Horario_detalle(Dia, Hora_entrada, Hora_salida, Id_horario) VALUES ('$this->Dia', '$this->Hora_entrada', '$this->Hora_salida' , $this->Id_horario)";
        $resultado = $asistencia_colegio->exec($sql);
        // header("Location: mostrarUsuarios.php");
        // exit();

        $asistencia_colegio->cerrar();

        return $resultado;

    }
}