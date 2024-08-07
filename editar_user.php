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

$consulta = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
} else {
    echo "Error al obtener información del usuario: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="editar_user.css">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Perfil</h1>
    <p>Nombre de usuario: <?php echo $fila['nombre']; ?></p>
    <p>Correo electrónico: <?php echo $fila['correo_electronico']; ?></p>

    <h2>Editar Información</h2>
    <form action="editar_usuario.php" method="post">
        <label for="nombre">Nuevo Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>
        <label for="email">Nuevo Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="<?php echo $fila['correo_electronico']; ?>"><br>
        <label for="contrasena">Nueva Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br>
        <input type="submit" value="Actualizar Información">
    </form>

    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>
