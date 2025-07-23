<?php

// recursos de text comuns
$cadenes["ca"]["header"] = "Institut<br>d'Estudis Moderns";
$cadenes["ca"]["nav_escola"] = "L'ESCOLA";
$cadenes["ca"]["nav_cursos"] = "CURSOS I HORARIS";
$cadenes["ca"]["nav_contacte"] = "SITUACIÓ I CONTACTE";
$cadenes["ca"]["footer"] = "Comparteix a";

$cadenes["es"]["header"] = "Instituto<br>de Estudios Modernos";
$cadenes["es"]["nav_escola"] = "LA ESCUELA";
$cadenes["es"]["nav_cursos"] = "CURSOS Y HORARIOS";
$cadenes["es"]["nav_contacte"] = "SITUACIÓN I CONTACTO";
$cadenes["es"]["footer"] = "Comparte en";


$idiomes_permesos = array("ca", "es");

// retorna el nou idioma si és vàlid, si no returna null
function idiomaValid($nou_idioma, $idiomes_permesos)
{
	if (in_array($nou_idioma, $idiomes_permesos))
		return $nou_idioma;
	return null;
}

// valor per defecte
$idioma = "ca";

//sobreescriure segons preferència del navegador
$idioma_navegador = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
$idioma = idiomaValid($idioma_navegador, $idiomes_permesos) ?? $idioma;

//sobreescriure segons preferència desada en cookies
$idioma = idiomaValid($_COOKIE["idioma"], $idiomes_permesos) ?? $idioma;

//sobreescriure segons preferència escollida i actualitzar cookie
if (isset($_GET["idioma"]) && idiomaValid($_GET["idioma"], $idiomes_permesos)) {
	$idioma = $_GET["idioma"];
	setcookie('idioma', $idioma, time() + 3600 * 24 * 30 * 12, '/');
}
