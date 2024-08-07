<?php
$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "tabla_galeria";

$usuario = $_POST["user"];
$contrasena = $_POST["pass"];
$email = $_POST["email"];

$conexion = mysqli_connect($servidor, $usuariodb, $passdb, $db);

// Corregimos el nombre de la columna "correo electronico" a "correo_electronico"
$consulta = "INSERT INTO usuarios (nombre, correo_electronico, contrasena) VALUES ('$usuario', '$email', '$contrasena')";

if(mysqli_query($conexion, $consulta)){
    echo "Usuario registrado";
} else {
    echo "Error al registrar el usuario: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
