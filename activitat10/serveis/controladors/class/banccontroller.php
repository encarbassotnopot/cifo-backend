<?php
namespace serveis\controladors\class;
require_once $_SERVER['DOCUMENT_ROOT'] . "/serveis/models/bancModel.php";
use serveis\models\BancModel;
use \Exception;
//definir la classe controlador
class BancController
{
    private BancModel $banc;

    public function __construct()
    {
        $this->banc = new BancModel();

    }

    public function alta($nif, $nom, $cognoms, $direccio, $telefon, $email)
    {
        $this->validarDades($nif, $nom, $cognoms, $direccio, $telefon, $email);
        $missatge = $this->banc->alta($nif, $nom, $cognoms, $direccio, $telefon, $email);
        return ['codi' => '00', 'missatges' => $missatge, 'dadespersona' => compact('nif', 'nom', 'cognoms', 'direccio', 'telefon', 'email')];
    }

    public function baixa($idpersona)
    {
        $this->validarId($idpersona);
        $missatge = $this->banc->baixa($idpersona);
        return ['codi' => '00', 'missatges' => $missatge];
    }

    public function modificacio($idpersona, $nif, $nom, $cognoms, $direccio, $telefon, $email)
    {
        $this->validarId($idpersona);
        $this->validarDades($nif, $nom, $cognoms, $direccio, $telefon, $email);
        $missatge = $this->banc->modificacio($nif, $nom, $cognoms, $direccio, $telefon, $email);
        return ['codi' => '00', 'missatges' => $missatge, 'dadespersona' => compact('nif', 'nom', 'cognoms', 'direccio', 'telefon', 'email')];
    }

    public function consulta($idpersona)
    {
        $this->validarId($idpersona);
        $missatge = $this->banc->consulta($idpersona);
        return ['codi' => '00', 'dadespersona' => $missatge];
    }

    public function consultaPersones($dadesPaginacio)
    {
        extract($dadesPaginacio);
        $filaInicial = ($pagina - 1) * $mostrar;
        return ['codi' => '00', 'dadespersones' => $this->banc->consultaPersones($filaInicial, $mostrar)];
    }

    private function validarDades($nif, $nom, $cognoms, $direccio, $telefon, $email)
    {
        $errors = "";
        if (empty($nif)) {
            $errors .= "Nif obligatori<br>";
        }
        if (empty($nom)) {
            $errors .= "Nom obligatori<br>";
        }
        if (empty($cognoms)) {
            $errors .= "Cognoms obligatori<br>";
        }
        if (empty($direccio)) {
            $errors .= "Adreça obligatoria<br>";
        }
        if (empty($telefon)) {
            $errors .= "Telèfon obligatori<br>";
        }
        if (!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors .= "Email malformat<br>";
            }
        }
        if (!empty($errors)) {
            throw new Exception($errors);
        }
    }
    private function validarId($id)
    {
        if (empty($id) || !is_numeric($id) || $id == 0) {
            throw new Exception("Cal seleccionar una persona", 14);
        }
    }
}