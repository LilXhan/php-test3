<?php

require_once "Conexion.php";

class Profesor {
    private $Dni;
    private $Nombres;
    private $Apellidos;


    public function __construct($Dni, $Nombres, $Apellidos){
        $this->Dni = $Dni;
        $this->Nombres = $Nombres;
        $this->Apellidos = $Apellidos;
    }

    public function guardar(){
        $asistencia_colegio = new Conexion();
        $asistencia_colegio->abrir();

        $sql = "INSERT INTO Profesor(Dni, Nombres, Apellidos) VALUES ('$this->Dni', '$this->Nombres', '$this->Apellidos')";
        $resultado = $asistencia_colegio->exec($sql);
        // header("Location: mostrarUsuarios.php");
        // exit();

        $asistencia_colegio->cerrar();

        return $resultado;
    }
}