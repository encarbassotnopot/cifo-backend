<?php
session_start();

//funció validació 
require_once "./funcions/validar_dades.php";

//recuperar les persones de l'array
$persones = $_SESSION["persones"] ?? [];

//recuperar les dades sense espais en blanc -trim()-
$nif = strtoupper(trim($_POST["nifModi"]));
$nom = trim($_POST["nomModi"]);
$direccio = trim($_POST["direccioModi"]);

try {

	//validar dades
	validar_dades($nif, $nom, $direccio);

	//validar que el nif existeixi a la base de dades
	if (!array_key_exists($nif, $persones))
		throw new Exception("El NIF no existeix");

	//modificar la persona a l'array
	$persones[$nif] = [
		"nom" => $nom,
		"direccio" => $direccio
	];
	//missatge de modificació efectuada
	$missatge = "Modificació efectuada correctament";

} catch (Exception $e) {
		$missatge = "Error en la modificació: " . $e->getMessage();
}

//compactarem en un array les variables php que es mostren en el document HTML i que corresponguin a l'operativa d'alta
$_SESSION["dades"] = compact("missatge");

//Traslladar el contingut de l'array $persones a la variable de sessió
$_SESSION["persones"] = $persones;

//Retornar a la pàgina principal
header("Location: ../persones.php");
