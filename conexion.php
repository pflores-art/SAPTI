<?php
// Le decimos a PHP cómo conectarse a nuestra base de datos local
$conexion = new mysqli("localhost", "root", "", "sapti_bd");

// Si el cable está roto, que nos avise
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>