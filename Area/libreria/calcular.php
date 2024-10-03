<?php
include('figuras.php');

$lado = 5; // valor predeterminado para el lado del cuadrado
$base = 3; // valor predeterminado para la base del triángulo
$altura = 4; // valor predeterminado para la altura del triángulo
$radio = 2; // valor predeterminado para el radio del círculo

$figuras = new Figuras($lado, $base, $altura, $radio);

$response = [];
$response['areaCuadrado'] = $figuras->areaCuadrado();
$response['areaTriangulo'] = $figuras->areaTriangulo();
$response['areaCirculo'] = $figuras->areaCirculo();

header('Content-Type: application/json');
echo json_encode($response);
?>