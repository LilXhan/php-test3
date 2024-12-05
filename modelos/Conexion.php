<?php 

class Conexion {

  public $dsn;
  public $username;
  public $contraseña;
  public $pdo;

  public function __construct() {
    $this->dsn = "mysql:host=127.0.0.1;dbname=asistencia_colegio";
    $this->username = "root";
    $this->contraseña = "root";
  }

  public function abrir() {
    try {
      $this->pdo = new PDO($this->dsn, $this->username, $this->contraseña);
    } catch (Exception $e) {
      echo "error $e";
    }
  }

  public function cerrar() {
    $this->pdo = null;
  }

  public function query($sql) {
    return $this->pdo->query($sql);
  }

  public function exec($sql) {
    return $this->pdo->exec($sql);
  }
}

?>