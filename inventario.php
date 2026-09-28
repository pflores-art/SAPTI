<?php
session_start();
include 'conexion.php';
if (!isset($_SESSION['nombre'])) { header("Location: login.php"); exit(); }

if (isset($_POST['guardar_activo'])) {
    $equipo = $_POST['nombre_equipo'];
    $serie = $_POST['numero_serie'];
    $conexion->query("INSERT INTO activos (nombre_equipo, numero_serie) VALUES ('$equipo', '$serie')");
}
if (isset($_GET['eliminar_activo'])) {
    $id = $_GET['eliminar_activo'];
    $conexion->query("DELETE FROM activos WHERE id = $id");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario - SAPTI</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="animado">
    <header>
        <h2>💻 Inventario de Activos</h2>
        <a href="dashboard.php" class="btn">⬅ Volver al Menú</a>
    </header>

    <div class="contenedor">
        <form method="POST">
            <input type="text" name="nombre_equipo" placeholder="Nombre (Ej: Laptop HP)" required>
            <input type="text" name="numero_serie" placeholder="Número de Serie" required>
            <button type="submit" name="guardar_activo">+ Agregar Equipo</button>
        </form>

        <table>
            <tr><th>Equipo</th><th>Número de Serie</th><th>Acciones</th></tr>
            <?php
            $activos = $conexion->query("SELECT * FROM activos");
            while ($fila = $activos->fetch_assoc()) {
                echo "<tr>
                        <td>{$fila['nombre_equipo']}</td>
                        <td>{$fila['numero_serie']}</td>
                        <td><a href='?eliminar_activo={$fila['id']}' class='accion'>❌ Borrar</a></td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>