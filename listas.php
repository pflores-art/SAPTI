<?php
session_start();
include 'conexion.php';
if (!isset($_SESSION['nombre'])) { header("Location: login.php"); exit(); }

if (isset($_POST['guardar_lista'])) {
    $nombre = $_POST['nombre_lista'];
    $conexion->query("INSERT INTO listas_validacion (nombre_lista, descripcion) VALUES ('$nombre', 'Pendiente')");
}
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Listas - SAPTI</title><link rel="stylesheet" href="estilos.css"></head>
<body class="animado">
    <header>
        <h2>✅ Listas de Validación</h2>
        <a href="dashboard.php" class="btn">⬅ Volver al Menú</a>
    </header>
    <div class="contenedor">
        <form method="POST">
            <input type="text" name="nombre_lista" placeholder="Nombre de la lista" required>
            <button type="submit" name="guardar_lista">+ Crear Lista</button>
        </form>
        <ul>
            <?php
            $listas = $conexion->query("SELECT * FROM listas_validacion");
            while ($fila = $listas->fetch_assoc()) {
                echo "<li><b>{$fila['nombre_lista']}</b> - {$fila['descripcion']}</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>