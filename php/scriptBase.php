<?php
require 'conexionBD.php';
// Aquí puedes realizar tus consultas o interacciones con la base de datos utilizando la conexión establecida
// Consulta a la base de datos
$sql = "SELECT * FROM Cliente";
$result = $conexion->query($sql);
// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Mostrar los datos obtenidos
    while ($row = $result->fetch_assoc()) {
        echo "RFC: " . $row["RFC"] . "<br>";
        echo "Nombre: " . $row["Nombre"] . "<br>";
        echo "Apellido Paterno: " . $row["ApellidoPaterno"] . "<br>";
        echo "Apellido Materno: " . $row["ApellidoMaterno"] . "<br>";
        // Continúa mostrando los demás campos que desees
        echo "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cierra la conexión
$conexion->close();
?>