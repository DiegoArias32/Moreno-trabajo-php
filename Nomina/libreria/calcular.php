<?php
// Incluye el archivo nomina.php, que probablemente contiene la clase Nomina
include('nomina.php');

// Obtiene el contenido de la solicitud HTTP (el cuerpo de la solicitud)
// y lo decodifica como un array asociativo utilizando json_decode
$data = json_decode(file_get_contents('php://input'), true);

// Asigna los valores de la solicitud a variables individuales
$valorDia = $data['valorDia'];
$diasTrabajados = $data['diasTrabajados'];
$edad = $data['edad'];

// Crea una instancia de la clase Nomina, pasando los valores de la solicitud como parámetros
$nomina = new Nomina($valorDia, $diasTrabajados, $edad);

// Crea un array vacío para almacenar la respuesta
$response = [];

// Llena el array de respuesta con los resultados de los métodos de la clase Nomina
$response['salario'] = $nomina->salario();
$response['salud'] = $nomina->salud();
$response['pension'] = $nomina->pension();
$response['arl'] = $nomina->arl();
$response['subTrans'] = $nomina->subTrans();
$response['retencion'] = $nomina->retencion();
$response['extra'] = $nomina->extra();
$response['deducible'] = $nomina->deducible();
$response['totalPagar'] = $nomina->totalPagar();

// Establece el encabezado Content-Type en application/json para indicar que la respuesta es un objeto JSON
header('Content-Type: application/json');

// Convierte el array de respuesta a un objeto JSON y lo imprime como salida
echo json_encode($response);
?>