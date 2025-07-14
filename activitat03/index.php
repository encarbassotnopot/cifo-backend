<?php
session_start();

//eliminar dades d'accessos anteriors
$_SESSION["persones"] = [];
$_SESSION["dades"] = [];

//accions a realitzar en entrar a l'aplicació
header("Location: ./persones.php");
