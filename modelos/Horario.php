<?php

require_once "Conexion.php";

class Horario {
    private $Id_profesor;
    private $Semestre;

    public function __construct($Id_profesor, $Semestre){
        $this->Id_profesor = $Id_profesor;
        $this->Semestre = $Semestre;
    }

    public function guardar(){
        $asistencia_colegio = new Conexion();
        $asistencia_colegio->abrir();

        $sql = "INSERT INTO Horario(Id_profesor, Semestre) VALUES ($this->Id_profesor, '$this->Semestre')";
        $resultado = $asistencia_colegio->exec($sql);
        // header("Location: mostrarUsuarios.php");
        // exit();

        $asistencia_colegio->cerrar();

        return $resultado;

    }
}