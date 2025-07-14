<?php

session_start();

//incorporar funció validació 
require_once "./funcions/validar_dades.php";

//recuperar les persones de l'array
$persones = $_SESSION["persones"] ?? [];

//recuperar les dades sense espais en blanc -trim()-
$nif = strtoupper(trim($_POST["nif"]));
$nom = trim($_POST["nom"]);
$direccio = trim($_POST["direccio"]);

try {
	//validar dades obligatòries
	validar_dades($nif, $nom, $direccio);
	//validar que el NIF no existeixi a la base de dades
	if (array_key_exists($nif, $persones))
		throw new Exception("El NIF ja existeix");
	//guardar la persona a l'array
	$persones[$nif] = [
		"nom" => $nom,
		"direccio" => $direccio
	];
	//missatge d'alta efectuada
	$missatge = "Alta efectuada correctament";
	//netejar el formulari
	$nif = null;
	$nom = null;
	$direccio = null;
} catch (Exception $e) {
		$missatge = "Error: " . $e->getMessage();
}

//compactarem en un array les variables php que es mostren en el document HTML i que corresponguin a l'operativa d'alta
$_SESSION["dades"] = compact("nif", "nom", "direccio", "missatge");

//Traslladar el contingut de l'array $persones a la variable de sessió
$_SESSION["persones"] = $persones;

//Retornar a la pàgina principal
header("Location: ../persones.php");
