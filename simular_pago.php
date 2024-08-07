<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .notificacion {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        .btn-suscribir {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            font-size: 18px;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .btn-volver {
            background-color: #cccccc;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            font-size: 18px;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-volver:hover {
            background-color: #999999;
        }
    </style>
</head>
<body>
    <div style="text-align: center; padding: 20px;">
        <p>Tu plan ha sido seleccionado. Por favor, presiona el botón para realizar tu pago:</p>
        <button onclick="simularPago()" class="btn-suscribir">Pagar</button>
        <a href="index.php" class="btn-volver">Volver al inicio</a>
    </div>

    <script>
        function simularPago() {
            // Aquí puedes simular el proceso de pago
            // Podrías realizar una llamada AJAX a un servidor simulado, o simplemente mostrar la notificación directamente

            // Mostrar la notificación de pago exitoso
            mostrarNotificacion("Pago realizado exitosamente");
        }

        function mostrarNotificacion(mensaje) {
            // Crear un elemento de notificación
            var notificacion = document.createElement("div");
            notificacion.className = "notificacion";
            notificacion.textContent = mensaje;

            // Agregar la notificación al cuerpo del documento
            document.body.appendChild(notificacion);

            // Eliminar la notificación después de unos segundos
            setTimeout(function() {
                notificacion.remove();
            }, 3000); // Notificación desaparecerá después de 3 segundos (3000 milisegundos)
        }
    </script>
</body>
</html>
