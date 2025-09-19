<?php
session_start();
$_SESSION['dadesbanc'] = [];
$_SESSION['dadespersones'] = [];
$_SESSION['paginacio'] = [
    'mostrar' => 5,
    'pagina' => 1
];
header("Location: /serveis/controladors/frontcontroller.php");