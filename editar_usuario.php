<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redirige si el usuario no ha iniciado sesión
    exit();
}

$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "tabla_galeria";

$conexion = mysqli_connect($servidor, $usuariodb, $passdb, $db);

$usuario_id = $_SESSION['usuario_id'];

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_email = $_POST['email'];
    $nueva_contrasena = $_POST['contrasena'];

    // Verificar si la contraseña no está vacía para evitar actualizarla accidentalmente
    if (!empty($nueva_contrasena)) {
        $consulta = "UPDATE usuarios SET nombre='$nuevo_nombre', correo_electronico='$nuevo_email', contrasena='$nueva_contrasena' WHERE id='$usuario_id'";
    } else {
        $consulta = "UPDATE usuarios SET nombre='$nuevo_nombre', correo_electronico='$nuevo_email' WHERE id='$usuario_id'";
    }

    if (mysqli_query($conexion, $consulta)) {
        $_SESSION['usuario_nombre'] = $nuevo_nombre; // Actualiza el nombre de usuario en la sesión
        header("Location: perfil_usuario.php"); // Redirige al perfil del usuario
        exit();
    } else {
        echo "Error al actualizar la información del usuario: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
