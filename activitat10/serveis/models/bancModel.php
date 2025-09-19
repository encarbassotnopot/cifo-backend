<?php
namespace serveis\models;
require_once $_SERVER['DOCUMENT_ROOT'] . "/serveis/models/connexio.php";
use serveis\models\utils\metodesComuns;
use \Exception;
use \PDO;
use \PDOException;

class bancModel extends Connexio
{

    public function __construct()
    {
        parent::__construct();
    }

    public function alta($nif, $nom, $cognoms, $direccio, $telefon, $email)
    {
        $sql = "INSERT INTO persones VALUES(NULL, :nif, :nom, :cognoms, :direccio, :telefon, :email, DEFAULT)";
        if (empty($email)) {
            $email = null;
        }
        $stmt = $this->connexio->prepare($sql);
        $stmt->bindParam(":nif", $nif);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":cognoms", $cognoms);
        $stmt->bindParam(":direccio", $direccio);
        $stmt->bindParam(":telefon", $telefon);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return "Alta efectuada correctament";
    }

    public function baixa($idpersona)
    {
        $sql = "DELETE FROM persones WHERE idpersona = $idpersona;";
        $stmt = $this->connexio->query($sql);
        if ($stmt->rowCount() == 0) {
            throw new Exception("Persona inexistent", 55);
        }
        return "Supressió exitosa";
    }

    public function modificacio($idpersona, $nif, $nom, $cognoms, $direccio, $telefon, $email)
    {

        $sql = "UPDATE persones SET(nif = :nif, nom = :nom, cognoms = :cognoms, direccio = :direccio, telefon = :telefon, email = :email) WHERE idpersona = :idpersona";
        if (empty($email)) {
            $email = null;
        }
        $stmt = $this->connexio->prepare($sql);
        $stmt->bindParam(":idpersona", $idpersona);
        $stmt->bindParam(":nif", $nif);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":cognoms", $cognoms);
        $stmt->bindParam(":direccio", $direccio);
        $stmt->bindParam(":telefon", $telefon);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            throw new Exception("No s'ha modificat cap dada", 35);
        }
        return "Modificació exitosa";
    }

    public function consulta($idpersona)
    {
        $sql = "SELECT * FROM persones WHERE idpersona = $idpersona;";
        $stmt = $this->connexio->query($sql);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();

        if ($stmt->rowCount() == 0) {
            throw new Exception("Persona no trobada", 55);
        }
        return $result;
    }

    public function consultaPersones($filaInicial, $mostrar)
    {
        $sql = "SELECT * FROM persones ORDER BY nom, cognoms LIMIT $filaInicial, $mostrar;";
        $stmt = $this->connexio->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();
        if ($stmt->rowCount() == 0) {
            throw new Exception("No hi ha dades", 11);
        }

        $sql = "SELECT COUNT(*) FROM persones;";
        $stmt = $this->connexio->query($sql);
        $files = $stmt->fetch();
        return [$result, ceil($files[0] / $mostrar)];
    }
}