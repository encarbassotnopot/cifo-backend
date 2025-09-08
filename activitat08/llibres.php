<?php
require_once "model/llibresModel.php";

$tipusPeticio = strtoupper($_SERVER["REQUEST_METHOD"]);
$inputJSON = file_get_contents('php://input');
$dades = json_decode($inputJSON, TRUE) ?? [];

$id = (int) ($_GET['id'] ?? null);

try {
	// operativa del controlador
	$model = new LlibresModel();

	switch ($tipusPeticio) {
		case 'GET': // consulta d'un o més llibres
			if ($id) {
				validar_id($id);
				$missatge = $model->consultaLlibre($id);
			} else {
				$missatge = $model->consultaLlibres();
			}
			break;
		case 'POST': // alta d'un llibre
			validar_dades($dades);
			$missatge = $model->altaLlibre($dades);
			break;
		case 'PUT': // modificació d'un llibre
			validar_id($id);
			validar_dades($dades);
			$missatge = $model->modificacioLlibe($id, $dades);
			break;
		case 'DELETE': // baixa de'un llibre
			validar_id($id);
			$missatge = $model->baixaLlibre($id);
			break;
		case 'OPTIONS': // no llançar excepció per la sol·licitud de preflight
			break;
		default:
			throw new Exception("petició incorrecta", 500);
	}
	header("Content-Type: text/html; charset=utf-8; HTTP/1.1 200 OK");
	echo json_encode(['missatge' => $missatge]);
} catch (Exception $e) {
	// enviar el missatge d'error
	echo json_encode(["error" => $e->getMessage()]);
	// enviar l'status http en las capçaleres de la petició
	header("Content-Type: text/html; charset=utf-8");
	header("HTTP/1.1 {$e->getCode()}");
}
header('Access-Control-Allow-Origin: *');
header(header: "Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

function validar_dades($dades)
{
	$errors = [];
	extract($dades);
	if (empty($titol)) {
		array_push($errors, "Títol obligatori");
	}
	if (empty($preu)) {
		array_push($errors, "Preu obligatori");
	}
	if (empty($autor)) {
		array_push($errors, "Autor obligatori");
	}
	if (empty($idcategoria)) {
		array_push($errors, "Categoria obligatoria");
	}
	if (sizeof($errors) > 0) {
		throw new Exception(implode(';', $errors), 400);
	}
}
function validar_id($id)
{
	if (is_null($id) || $id <= 0) {
		throw new Exception("ID Invàlid", 400);
	}
}
?>