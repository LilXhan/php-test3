<?php
require_once("modelos/Conexion.php");

$conexion = new Conexion();
$conexion->abrir();

$sql = "
    SELECT 
        Profesor.Nombres AS Nombre_profesor, 
        Profesor.Apellidos AS Apellido_profesor, 
        Horario.Semestre AS Nombre_semestre, 
        Horario_detalle.Dia, 
        Horario_detalle.Hora_entrada, 
        Horario_detalle.Hora_salida
    FROM Profesor
    INNER JOIN Horario ON Profesor.Id = Horario.Id_profesor
    INNER JOIN Horario_detalle ON Horario.Id = Horario_detalle.Id_horario
";
$resultado = $conexion->query($sql);

$conexion->cerrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosTabla.css">
    <title>Tabla de Profesores, Semestres y Horarios</title>
</head>
<body>
    <div class="container">
        <h2>Profesores, Semestres y Horarios</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre del Profesor</th>
                    <th>Apellido del Profesor</th>
                    <th>Semestre</th>
                    <th>Día</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->rowCount() > 0): ?>
                    <?php foreach ($resultado as $fila): ?>
                        <tr>
                            <td><?php echo $fila['Nombre_profesor']; ?></td>
                            <td><?php echo $fila['Apellido_profesor']; ?></td>
                            <td><?php echo $fila['Nombre_semestre']; ?></td>
                            <td><?php echo $fila['Dia']; ?></td>
                            <td><?php echo $fila['Hora_entrada']; ?></td>
                            <td><?php echo $fila['Hora_salida']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No se encontraron registros</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
