<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" type="text/css" href="registro.css">
</head>
<body>
    <h1>Registro de usuario</h1>
    <form action="registrar_usuario.php" method="post">
        <label for="user">Nombre de usuario:</label>
        <br>
        <input type="text" name="user" id="user">
        <br>
        <label for="email">Email:</label>
        <br>
        <input type="text" name="email" id="email">
        <br>
        <label for="pass">Contraseña:</label>
        <br>
        <input type="text" name="pass" id="pass">
        <br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>