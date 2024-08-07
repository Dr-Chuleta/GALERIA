<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="acomodo.js"></script>
    <title>Mi galeria de imagenes</title>
    <style>
        .galeria {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Opcional: ajusta la distribución horizontal */
            position: relative; /* Establece el contexto para las imágenes */
        }

        .imagen {
            width: 30%; /* Ajusta el ancho de las imágenes según tu preferencia */
            margin-bottom: 30px; /* Espacio entre las imágenes */
            position: relative; /* Establece el contexto para las imágenes */
            cursor: pointer;
        }

        .imagen img {
            width: 100%;
            height: 100%;
            transition: transform 0.3s; /* Transición suave para el cambio de tamaño */
        }

        .informacion {
            display: none;
            position: absolute;
            top: 0;
            left: 110%; /* Alinea la información a la derecha de la imagen */
            background-color: rgba(255, 255, 255, 0.8); /* Ajusta el fondo para que el texto sea legible */
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Agrega sombra para resaltar la información */
            z-index: 1; /* Asegura que la información esté encima de las imágenes */
            transition: left 0.3s; /* Transición suave para mostrar y ocultar la información */
        }

        .imagen:hover img {
            transform: scale(1.2); /* Aumenta el tamaño de la imagen al pasar el ratón sobre ella */
        }

        .imagen:hover .informacion {
            display: block;
            left: 0; /* Muestra la información a la izquierda de la imagen */
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: bold;
            color: #333;
        }
        body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}
header {
  background-color: #333;
  color: #fff;
  padding: 1em;
  text-align: center;
}

header nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: space-between;
}

header nav ul li {
  margin-right: 20px;
}

header nav a {
  color: #fff;
  text-decoration: none;
}

header nav a:hover {
  color: #ccc;
}
footer {
  background-color: #333;
  color: #fff;
  padding: 1em;
  text-align: center;
  clear: both;
}

footer ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: space-between;
}

footer ul li {
  margin-right: 20px;
}

footer a {
  color: #fff;
  text-decoration: none;
}

footer a:hover {
  color: #ccc;
}
.imagen {
  margin: 20px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.imagen p {
  margin-bottom: 10px;
}
    </style>
</head>
<body>
    <header>
        <div class="izquierda">
            <img src="galeria.png" alt="Imagen a la izquierda del encabezado", width="15%" height= "15%">
            <h1>Mi galería de imágenes</h1>
        </div>
        <nav>
            <ul>
                <li><a href="Up_login.php">Subir imagen</a></li>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a href="editar_user.php">Modificar usuario</a></li>
                <li><a href="planes.php">Planes de Suscripción</a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <div class="cuerpo">
        
        <div class="galeria">
            <?php
            $servidor = "localhost";
            $usuariodb = "root";
            $passdb = "";
            $db = "tabla_galeria";
            
            // Establecer la conexión
            $conn = mysqli_connect($servidor, $usuariodb, $passdb, $db);

            // Consulta SQL para seleccionar todas las imágenes
            $sql = "SELECT imagenes.*, usuarios.nombre AS nombre_usuario, usuarios.correo_electronico FROM imagenes INNER JOIN usuarios ON imagenes.usuario_id = usuarios.id";

            $resultado = mysqli_query($conn, $sql);

            // Iterar sobre los resultados y mostrar las imágenes
            while ($fila = mysqli_fetch_assoc($resultado)) {
                mysqli_query($conn, "UPDATE imagenes SET vistas = vistas + 1 WHERE id = " . $fila['id']);

                echo "<div class='imagen'>";
                echo "<img src='data:image/jpeg;base64," . base64_encode($fila['contenido']) . "' onclick='toggleInformacion(this)'>";
                echo "<div class='informacion'>";
                echo "<p>Usuario: " . $fila['nombre_usuario'] . "</p>"; // Muestra el nombre del usuario
                echo "<p>Correo: " . $fila['correo_electronico'] . "</p>"; // Muestra el correo del usuario
                echo "<p>Fecha de Subida: " . $fila['fecha_subida'] . "</p>";
                echo "<p>Vistas: " . $fila['vistas'] . "</p>"; // Muestra el número de vistas de la imagen
                echo "</div>";
                echo "</div>";
            }
            
            // Cerrar la conexión
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script>
        function toggleInformacion(img) {
            var informacion = img.nextElementSibling;
            informacion.style.display = (informacion.style.display === 'block') ? 'none' : 'block';
        }
    </script>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Juan Antonio Carmona Morales </p>
    </footer>
</body>
</html>
