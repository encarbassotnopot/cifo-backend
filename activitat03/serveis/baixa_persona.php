<?php
session_start();

//recuperar les persones de l'array
$persones = $_SESSION["persones"] ?? [];

//recuperar el NIF
$nif = $_POST["nifBaixa"] ?? null;

try {
	//validar NIF informat i existent
	if (empty($nif) || !array_key_exists($nif, $persones)) 
		throw new Exception("El NIF no existeix");
	
	//esborrar la fila de l'array
	unset($persones[$nif]);

	//missatge de baixa efectuada
	$missatge = "Baixa efectuada correctament";

} catch (Exception $e) {
	$missatge = "Error durant la baixa: " . $e->getMessage();
}

//compactarem en un array les variables php que es mostren en el document HTML i que corresponguin a l'operativa d'alta
$_SESSION["dades"] = compact("missatge");

//Traslladar el contingut de l'array $persones a la variable de sessió
$_SESSION["persones"] = $persones;

//Retornar a la pàgina principal
header("Location: ../persones.php");
