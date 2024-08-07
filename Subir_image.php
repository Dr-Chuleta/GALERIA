<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    echo "Error: No has iniciado sesión.";
    exit();
}

$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "tabla_galeria";

// Establecer la conexión
$conn = mysqli_connect($servidor, $usuariodb, $passdb, $db);

// Verificar si hay errores de conexión
if (mysqli_connect_errno()) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesar la carga de imágenes si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $nombre_archivo = $_FILES["archivo"]["name"];
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];
    $tipo_archivo = $_FILES["archivo"]["type"];
    $tamano_archivo = $_FILES["archivo"]["size"];

    // Verificar si el archivo es una imagen válida
    $permitidos = array("image/jpeg", "image/png", "image/gif");
    if (!in_array($tipo_archivo, $permitidos)) {
        echo "Error: Solo se permiten imágenes JPEG, PNG y GIF.";
        exit();
    }

    // Guardar la imagen en la base de datos
    $contenido_imagen = file_get_contents($archivo_temporal);
    $usuario_id = $_SESSION['usuario_id']; // Obtener el ID del usuario desde la sesión
    $fecha_subida = date("Y-m-d H:i:s");

    $sql = "INSERT INTO imagenes (nombre_archivo, usuario_id, fecha_subida, vistas, contenido) VALUES (?, ?, ?, 0, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "siss", $nombre_archivo, $usuario_id, $fecha_subida, $contenido_imagen);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['upload_success'] = true;
    } else {
        $error_message = "Error al subir la imagen a la base de datos: " . mysqli_error($conn);
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
}

// Cerrar la conexión
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="subir.css">
    <title>Subir Imagen</title>
</head>
<body>
    <h1 class="titulo">Sube otro archivo</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <button type="submit">Subir Imagen</button>
    </form>

    <form action="index.php">
        <button type="submit" class="return-button">Volver al inicio</button>
    </form>

    <?php
    // Verifica si la variable de sesión de éxito de carga está establecida
    if (isset($_SESSION['upload_success']) && $_SESSION['upload_success']) {
        // Muestra la alerta de éxito
        echo '<div class="alert">';
        echo '<span class="close-btn" onclick="this.parentElement.style.display=\'none\'">&times;</span>';
        echo '<p class="alert-message">¡La imagen se ha subido correctamente!</p>';
        echo '</div>';
        // Limpia la variable de sesión
        unset($_SESSION['upload_success']);
    }
    ?>
</body>
</html>
