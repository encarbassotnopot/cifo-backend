<?php
session_start();

$missatge = "Totes les persones han estat donades de baixa correctament.";

//compactarem en un array les variables php que es mostren en el document HTML i que corresponguin a l'operativa d'alta
$_SESSION["dades"] = compact("missatge");

//Assignar una array buida a la variable de sessió $persones 
$_SESSION['persones'] = [];

//Retornar a la pàgina principal
header("Location: ../persones.php");