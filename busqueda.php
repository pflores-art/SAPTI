<?php
session_start();
include 'conexion.php';
if (!isset($_SESSION['nombre'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Búsqueda - SAPTI</title><link rel="stylesheet" href="estilos.css"></head>
<body class="animado">
    <header>
        <h2>🔍 Búsqueda de Información</h2>
        <a href="dashboard.php" class="btn">⬅ Volver al Menú</a>
    </header>
    <div class="contenedor">
        <form method="GET">
            <input type="text" name="buscar" placeholder="Buscar actividades..." required>
            <button type="submit">Buscar</button>
        </form>
        
        <?php
        if(isset($_GET['buscar'])){
            $busqueda = $_GET['buscar'];
            $resultados = $conexion->query("SELECT * FROM actividades WHERE titulo LIKE '%$busqueda%'");
            
            echo "<h3>Resultados encontrados:</h3><ul>";
            while ($fila = $resultados->fetch_assoc()) {
                echo "<li>{$fila['titulo']} (Estado: {$fila['estado']})</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>
</html>