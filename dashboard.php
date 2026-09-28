<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal - SAPTI</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="animado">

    <header>
        <h2>SAPTI - Sistema de Procesos TI</h2>
        <div class="menu-botones">
            <span style="margin-right: 15px; font-weight: bold;">Hola, <?php echo $_SESSION['nombre']; ?></span>
            <a href="perfil.php" class="btn btn-perfil">👤 Mi Perfil</a>
            <a href="logout.php" class="btn btn-salir">🚪 Cerrar Sesión</a>
        </div>
    </header>
    
    <div class="grid-menu animado">
        <a href="actividades.php" class="tarjeta-menu">
            <div class="icono-menu">📋</div>
            <h3>Gestión de Actividades</h3>
        </a>
        <a href="inventario.php" class="tarjeta-menu">
            <div class="icono-menu">💻</div>
            <h3>Inventario de Activos</h3>
        </a>
        <a href="listas.php" class="tarjeta-menu">
            <div class="icono-menu">✅</div>
            <h3>Listas de Validación</h3>
        </a>
        <a href="busqueda.php" class="tarjeta-menu">
            <div class="icono-menu">🔍</div>
            <h3>Búsqueda General</h3>
        </a>
    </div>

</body>
</html>