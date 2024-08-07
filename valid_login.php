<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "tabla_galeria";

$usuario = $_POST["user"];
$contrasena = $_POST["pass"];

$conexion = mysqli_connect($servidor, $usuariodb, $passdb, $db);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para verificar el usuario y la contraseña
$consulta = "SELECT id, nombre FROM usuarios WHERE nombre=? AND contrasena=?";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['usuario_id'] = $fila['id']; // Guardar el ID del usuario en la sesión
    $_SESSION['usuario_nombre'] = $fila['nombre']; // Guardar el nombre del usuario en la sesión
    header("Location: Up_login.php");
    exit();
} else {
    echo "Error: Usuario y/o contraseña son incorrectos.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
