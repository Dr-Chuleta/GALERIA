<?php
session_start();
if(isset($_SESSION["usuario_id"])){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos al servidor</title>
    <link rel="stylesheet" type="text/css" href="Up_login.css">
</head>
<body>
    <h1 class="titulo">Subir archivos</h1>
    <form action="Subir_image.php" enctype="multipart/form-data" method="post">
        <input type="file" name="archivo" id="">
        <input type="submit" value="Enviar">
    </form>
    <form action="cerrar_sesion.php" method="post">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>
</html>
<?php
}else{
    header("Location: login.php");
    exit();
}
?>
