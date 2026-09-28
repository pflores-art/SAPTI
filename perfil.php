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
    <title>Mi Perfil - SAPTI</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body class="animado">

    <header>
        <h2>Mi Perfil</h2>
        <a href="dashboard.php" class="btn">⬅ Volver al Panel</a>
    </header>

    <div class="contenedor" style="max-width: 600px; margin: 0 auto; text-align: center;">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Foto de perfil" style="width: 150px; margin-bottom: 20px;">
        <h3 style="border: none; margin-bottom: 5px;"><?php echo $_SESSION['nombre']; ?></h3>
        <p style="color: #7f8c8d; margin-top: 0;"><strong>Rol:</strong> <?php echo $_SESSION['rol']; ?></p>
        <hr style="border: 1px solid #eee; margin: 20px 0;">
        <p><strong>Correo Electrónico:</strong> <?php echo $_SESSION['correo']; ?></p>
        <p><strong>Estado de cuenta:</strong> <span style="color: green;">Activo ✔</span></p>
    </div>

</body>
</html>