<?php
require_once("modelos/Conexion.php");

$conexion = new Conexion();
$conexion->abrir();

$sqlProfesores = "
    SELECT Profesor.Id AS Id_profesor, Profesor.Nombres, Profesor.Apellidos, Horario.Semestre AS Nombre_semestre, Horario.Id as Id_horario
    FROM Profesor
    INNER JOIN Horario ON Profesor.Id = Horario.Id_profesor
";
$profesores = $conexion->query($sqlProfesores);

$conexion->cerrar();

if (isset($_POST["submit"])) {
    $Id_horario = $_POST["Id_horario"];
    $Dia = $_POST["Dia"];
    $Hora_entrada = $_POST["Hora_entrada"];
    $Hora_salida = $_POST["Hora_salida"];

    require_once("controladores/HorarioDetalleController.php");

    $horarioController = new HorarioDetalleController();
    echo $horarioController->guardar($Dia, $Hora_entrada, $Hora_salida, $Id_horario);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosRegistrarEditar.css">
    <title>Registrar Horario Detalle</title>
</head>
<body>
    <div class="container">
        <h2>Registrar Horario Detalle para Profesor</h2>
        <form method="post" action="#">
            <label for="Profesor">Seleccionar Profesor y Semestre:</label>
            <select id="Id_horario" name="Id_horario" required>
                <option value="">-- Seleccionar Profesor --</option>
                <?php foreach ($profesores as $profesor): ?>
                    <option value="<?php echo $profesor['Id_horario']; ?>">
                        <?php echo $profesor['Nombres'] . " " . $profesor['Apellidos'] . " - " . $profesor['Nombre_semestre']; ?>
                    </option>
                <?php endforeach; ?>      
            </select>

            <label for="Dia">Día de la Semana:</label>
            <select id="Dia" name="Dia" required>
                <option value="">-- Seleccionar Día --</option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
            </select>

            <label for="Hora_entrada">Hora de Entrada:</label>
            <input type="time" id="Hora_entrada" name="Hora_entrada" required/><br>

            <label for="Hora_salida">Hora de Salida:</label>
            <input type="time" id="Hora_salida" name="Hora_salida" required/><br>
            
            <input type="submit" name="submit" value="Guardar"/><br>
        </form>
    </div>
</body>
</html>
