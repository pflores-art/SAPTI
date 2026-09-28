<?php
session_start();
include 'conexion.php';
if (!isset($_SESSION['nombre'])) { header("Location: login.php"); exit(); }

if (isset($_GET['eliminar_actividad'])) {
    $id = $_GET['eliminar_actividad'];
    $conexion->query("DELETE FROM actividades WHERE id = $id");
}
if (isset($_GET['completar_actividad'])) {
    $id = $_GET['completar_actividad'];
    $conexion->query("UPDATE actividades SET estado = 'Completada' WHERE id = $id");
}
if (isset($_POST['guardar_actividad'])) {
    // 1. Recibimos el texto, pero usamos trim() para cortar los espacios en blanco al inicio y al final
    $titulo = trim($_POST['titulo']);
    
    // 2. Verificamos si, después de limpiar los espacios, quedó algo escrito
    if (!empty($titulo)) {
        // Si hay texto real, lo guardamos en la base de datos
        $conexion->query("INSERT INTO actividades (titulo, estado) VALUES ('$titulo', 'Pendiente')");
        $mensaje = "<p style='color:green;'>Actividad guardada correctamente.</p>";
    } else {
        // Si solo eran espacios, mostramos un error de validación
        $mensaje = "<p style='color:red;'>Error: La tarea no puede estar vacía.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividades - SAPTI</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="animado">
    <header>
        <h2>📋 Gestión de Actividades</h2>
        <a href="dashboard.php" class="btn">⬅ Volver al Menú</a>
    </header>

    <div class="contenedor">
        <form method="POST">
            <input type="text" name="titulo" placeholder="¿Qué tarea tienes pendiente?" required>
            <button type="submit" name="guardar_actividad">+ Agregar Tarea</button>
        </form>

        <table>
            <tr><th>ID</th><th>Descripción</th><th>Estado</th><th>Acciones</th></tr>
            <?php
            $actividades = $conexion->query("SELECT * FROM actividades");
            while ($fila = $actividades->fetch_assoc()) {
                echo "<tr>
                        <td>{$fila['id']}</td>
                        <td>{$fila['titulo']}</td>
                        <td>{$fila['estado']}</td>
                        <td>
                            <a href='?completar_actividad={$fila['id']}' class='accion-mod'>✔ Completar</a> | 
                            <a href='?eliminar_actividad={$fila['id']}' class='accion'>❌ Borrar</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>