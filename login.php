<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="con">
        <h1 class="titulo">Iniciar sesión</h1>
        <br>
        <form action="valid_login.php" method="post">
            <label for="user">Nombre de usuario</label>
            <input type="text" name="user" id="user" required>
            <label for="email">Correo electronico</label>
            <input type="text" name="email" id="email" required>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="pass" required>
            <input type="submit" value="Iniciar Sesión">
            <br>
            <div class="regis">
                <br>
                ¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>
            </div>
        </form>
    </div>
</body>
</html>
