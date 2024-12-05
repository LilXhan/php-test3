<?php

require_once("modelos/Conexion.php");

$asistencia_colegio = new Conexion();
$asistencia_colegio->abrir();

$sql = "SELECT * FROM Profesor";
$profesores = $asistencia_colegio->query($sql);

$asistencia_colegio->cerrar();


if (isset($_POST["submit"])) {
    $Id_profesor = $_POST["Id_profesor"];
    $Semestre = $_POST["Semestre"];

    require_once("controladores/HorarioController.php");

    $asistencia_colegio = new HorarioController();
    echo $asistencia_colegio->guardar($Id_profesor, $Semestre);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosRegistrarEditar.css">
    <title>Semestre de Profesor</title>
</head>
<body>
    <div class="container">
    <h2>Semestre de Profesor</h2>
        <form method="post" action="#">
        <label for="Profesor">Seleccionar Profesor:</label>
        <select id="Id_profesor" name="Id_profesor">
        <option value="">-- Seleccionar Profesor --</option>
            <?php foreach ($profesores as $profesor): ?>
                <option value="<?php echo $profesor['Id']; ?>">
                    <?php echo $profesor['Nombres'] . " " . $profesor['Apellidos']; ?>
                </option>
            <?php endforeach; ?>      
        </select>

        <label for="Semestre">Semestre:</label>
        <input type="text" id="Semestre" name="Semestre" placeholder="Ingresar Semestre"/><br>
        
            
        <input type="submit" name="submit" value="Guardar"/><br>
        </form>
    </div>
</body>
</html>