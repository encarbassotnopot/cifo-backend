<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/serveis/controladors/class/banccontroller.php";
use serveis\controladors\class\BancController;


$dadesPaginacio['mostrar'] = $_GET['mostrar'] ?? $_SESSION['paginacio']['mostrar'] ?? 5;
$dadesPaginacio['pagina'] = $_GET['pagina'] ?? $_SESSION['paginacio']['pagina'] ?? 1;

//recuperar petició i dades del formulari

$peticio = $_POST['peticio'] ?? null;
$idpersona = trim($_POST['idpersona'] ?? null);
$nif = trim($_POST['nif'] ?? null);
$nom = trim($_POST['nom'] ?? null);
$cognoms = trim($_POST['cognoms'] ?? null);
$direccio = trim($_POST['direccio'] ?? null);
$telefon = trim($_POST['telefon'] ?? null);
$email = trim($_POST['email'] ?? null);

//instanciar el controlador

try {
    $banc = new BancController();

    switch ($peticio) {
        case 'alta':
            $resposta = $banc->alta($nif, $nom, $cognoms, $direccio, $telefon, $email);
            break;
        case 'consulta':
            $resposta = $banc->consulta($idpersona);
            break;
        case 'modificacio':
            $resposta = $banc->modificacio($idpersona, $nif, $nom, $cognoms, $direccio, $telefon, $email);
            break;
        case 'baixa':
            $resposta = $banc->baixa($idpersona);
            break;
    }
} catch (PDOException $e) {

    if ($e->errorInfo[1] == 1062) {
        $msg = 'NIF o Correu repetit';
        $codi = 30;
    } else if ($e->errorInfo[1] == 1451) {
        $msg = 'No es pot eliminar un usuari amb comptes associats';
        $codi = 20;
    } else {
        $msg = "Error";
        $codi = 100;
    }
    $resposta = [
        'codi' => $codi,
        'missatges' => $msg,
        'dadespersona' => compact('nif', 'nom', 'cognoms', 'direccio', 'telefon', 'email')
    ];
} catch (Exception $e) {
    $resposta = [
        'codi' => $e->getCode(),
        'missatges' => $e->getMessage(),
        'dadespersona' => compact('nif', 'nom', 'cognoms', 'direccio', 'telefon', 'email')
    ];
}

try {
    $persones = $banc->consultaPersones($dadesPaginacio);
} catch (Exception $e) {
    $resposta = ['codi' => $e->getCode(), 'missatges' => $e->getMessage()];
}

$_SESSION['dadesbanc'] = $resposta ?? [];
$_SESSION['dadespersones'] = $persones['dadespersones'][0] ?? [];
$_SESSION['paginacio'] = [
    'enllacos' => $persones['dadespersones'][1] ?? 0,
    'mostrar' => $dadesPaginacio['mostrar'],
    'pagina' => $dadesPaginacio['pagina']
];
header("Location: /banc.php");
