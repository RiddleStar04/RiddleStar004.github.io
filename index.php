<?php
require_once 'componentes.php';
require_once 'flota.php';

$chasis = new Chasis("Heavy Duty");
$motor = new Motor(450);
$carroceria = new Carroceria("Blanco");

$camion = new Camion("AAA123", "Volvo", "FH16", $chasis->getTipo(), $motor->getPotencia(), $carroceria->getColor(), 20000);
$camionFrigorifico = new CamionFrigorifico("BBB456", "Scania", "R500", $chasis->getTipo(), $motor->getPotencia(), $carroceria->getColor(), 18000, -5);
$utilitario = new Utilitario("CCC789", "Mercedes", "Sprinter", $chasis->getTipo(), $motor->getPotencia(), $carroceria->getColor(), 15);

$flota = new Flota();
$flota->agregarVehiculo($camion);
$flota->agregarVehiculo($camionFrigorifico);
$flota->agregarVehiculo($utilitario);

ob_start();
?>
<h2>Detalles de la Flota</h2>
<table>
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Chasis</th>
            <th>Motor</th>
            <th>Carrocería</th>
            <th>Estado de Mantenimiento</th>
            <th>Capacidad de Carga</th>
            <th>Temperatura</th>
            <th>Capacidad de Volumen</th>
        </tr>
    </thead>
    <tbody>
        <?php $flota->getDetallesFlota(); ?>
    </tbody>
</table>
<?php
$detallesFlota = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Flota - Homero Jay Shipping</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        form {
            max-width: 600px;
            margin: auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Gestión de Flota</h1>
    <?php echo $detallesFlota; ?>

    <h2>Programar Mantenimiento</h2>
    <form action="programar_mantenimiento.php" method="post">
        <label for="matricula">Matrícula del Vehículo:</label>
        <input type="text" id="matricula" name="matricula" required><br><br>

        <label for="estado">Estado de Mantenimiento:</label>
        <input type="text" id="estado" name="estado" required><br><br>

        <input type="submit" value="Programar Mantenimiento">
    </form>
</body>
</html>