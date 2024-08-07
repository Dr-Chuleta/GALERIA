<?php
$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "tabla_galeria";

// Establecer la conexión
$conn = mysqli_connect($servidor, $usuariodb, $passdb, $db);

// Verificar si hay errores de conexión
if (mysqli_connect_errno()) {
    die("Error de conexión: " . mysqli_connect_error());
} else {
    echo "Conexión establecida";
}

// Cerrar la conexión
mysqli_close($conn);
?>
