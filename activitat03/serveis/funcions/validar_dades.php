<?php

//FUNCIÓ DE VALIDACIÓ DE DADES COMUNES
function validar_dades($nif, $nom, $direccio)
{
	//validar dades obligatòries
	if (!isset($nif))
		throw new Exception("Cal especificar un NIF");
	if (!preg_match("/^\d{8}[A-Z]$/", $nif))
		throw new Exception("El NIF no és vàlid");

	if (!isset($nom) || !trim($nom))
		throw new Exception("El nom no pot estar en blanc");

	if (!isset($direccio) || !trim($direccio))
		throw new Exception("La direcció no pot estar en blanc");
}
