<?php
session_start(); // Iniciamos la "memoria" del sistema
include 'conexion.php';

if (isset($_POST['entrar'])) {
    $correo = $_POST['correo'];
    $pass = $_POST['password'];

    $consulta = "SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$pass'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        // Guardamos los datos del usuario en la memoria de la sesión
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['correo'] = $usuario['correo'];
        $_SESSION['rol'] = $usuario['rol'];
        
        header("Location: dashboard.php");
    } else {
        echo "<p style='color:red;'>Datos incorrectos. Intenta de nuevo.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="estilos.css"></head>
<body class="animado">
    <div class="contenedor" style="max-width: 400px; margin: 50px auto; text-align: center;">
        <h2>Entrar a SAPTI</h2>
        <form method="POST" style="flex-direction: column;">
            <input type="email" name="correo" placeholder="Correo (admin@empresa.com)" required style="width: 90%;">
            <input type="password" name="password" placeholder="Contraseña (12345)" required style="width: 90%;">
            <button type="submit" name="entrar" style="width: 95%;">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>