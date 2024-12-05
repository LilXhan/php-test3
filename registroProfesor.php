<?php
if (isset($_POST["submit"])) {
    $Dni = $_POST["Dni"];
    $Nombres = $_POST["Nombres"];
    $Apellidos = $_POST["Apellidos"];


    require_once("controladores/ProfesorController.php");

    $asistencia_colegio = new ProfesorController();
    echo $asistencia_colegio->guardar($Dni, $Nombres, $Apellidos);
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosRegistrarEditar.css">
    <title>Registrar Profesor</title>
</head>
<body>
    <div class="container">
    <h2>Agregar Usuario</h2>
        <form method="post" action="#">
            <label for="Nombres">Nombres:</label>
            <input type="text" id="Nombres" name="Nombres" placeholder="Ingresar Nombres"/><br>
            
            <label for="Apellidos">Apellidos:</label>
            <input type="text" id="Apellidos" name="Apellidos" placeholder="Ingresar Apellidos"/><br>
            
            <label for="Dni">Dni:</label>
            <input type="text" id="Dni" name="Dni" placeholder="Ingresar Dni"/><br>
            
            <input type="submit" name="submit" value="Guardar"/><br>
        </form>
    </div>
</body>
</html>