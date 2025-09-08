<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$nombreBD = 'proyecto_dj';

// Establecer la conexión
$conexion = new mysqli($host, $usuario, $contrasena, $nombreBD);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
