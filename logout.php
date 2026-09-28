<?php
session_start(); // Llamamos a la memoria
session_destroy(); // ¡La destruimos! (Cerramos sesión)

// Redirigimos al usuario a la pantalla de login
header("Location: login.php");
exit();
?>