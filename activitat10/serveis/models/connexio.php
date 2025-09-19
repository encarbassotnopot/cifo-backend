<?php
namespace serveis\models;

use \PDO;
use \PDOException;
use \Exception;

class Connexio
{
    const DSN = "mysql:host=127.0.0.1;dbname=banc;charset=UTF8";
    protected $connexio;

    public function __construct()
    {
        try {
            $this->connexio = new PDO(self::DSN, 'root', 'root');
            $this->connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}