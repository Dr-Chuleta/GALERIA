<?php
// Verificar si se ha enviado el ID de la imagen
if (isset($_POST['imagenId'])) {
    $imagenId = $_POST['imagenId'];

    // Conectar a la base de datos
    $servidor = "localhost";
    $usuariodb = "root";
    $passdb = "";
    $db = "tabla_galeria";
    $conn = mysqli_connect($servidor, $usuariodb, $passdb, $db);

    // Verificar si hay errores de conexión
    if (mysqli_connect_errno()) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Incrementar las vistas de la imagen en la base de datos
    $sql = "UPDATE imagenes SET vistas = vistas + 1 WHERE id = $imagenId";
    if (mysqli_query($conn, $sql)) {
        // Obtener el número actualizado de vistas
        $sql_vistas = "SELECT vistas FROM imagenes WHERE id = $imagenId";
        $resultado = mysqli_query($conn, $sql_vistas);
        $fila = mysqli_fetch_assoc($resultado);
        $vistas_actualizadas = $fila['vistas'];
        echo $vistas_actualizadas; // Devolver el número de vistas actualizado
    } else {
        echo "Error al actualizar las vistas";
    }

    // Cerrar la conexión
    mysqli_close($conn);
} else {
    echo "ID de imagen no recibido";
}
?>
