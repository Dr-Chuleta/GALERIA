<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes de Precios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .pricing-table {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .pricing-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .pricing-card:hover {
            transform: scale(1.05);
        }
        .pricing-card h2 {
            margin-top: 0;
        }
        .price {
            font-size: 24px;
            color: #333;
        }
        .features {
            list-style-type: none;
            padding: 0;
        }
        .features li {
            margin: 10px 0;
        }
        .button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="pricing-table">
    <div class="pricing-card">
            <h2>Básico</h2>
            <p class="price">$79/mes</p>
            <ul class="features">
                <li>1 usuario</li>
                <li>3GB de almacenamiento</li>
                <li>Soporte básico</li>
            </ul>
            <a href="simular_pago.php" class="button">Comprar</a>
        </div>
        <div class="pricing-card">
            <h2>Estándar</h2>
            <p class="price">$149/mes</p>
            <ul class="features">
                <li>5 usuarios</li>
                <li>15GB de almacenamiento</li>
                <li>Soporte prioritario</li>
            </ul>
            <a href="simular_pago.php" class="button">Comprar</a>
        </div>
        <div class="pricing-card">
            <h2>Premium</h2>
            <p class="price">$229/mes</p>
            <ul class="features">
                <li>Usuarios ilimitados</li>
                <li>50GB de almacenamiento</li>
                <li>Soporte 24/7</li>
            </ul>
            <a href="simular_pago.php" class="button">Comprar</a>
        </div>
    </div>
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>