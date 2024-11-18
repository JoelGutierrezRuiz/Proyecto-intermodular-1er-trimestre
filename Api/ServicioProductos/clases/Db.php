<?php
include "../config/config.php";
class Db
{

    private $link;
    function __construct()
    {
        try {
			$this->link = new PDO("mysql:host=" . HOST . ";dbname=" . BASE, USUARIO, PASS, OPCIONES);
        } catch (PDOException $e) {
            //buscar una mejor manera de devolver este error
            return $e->getMessage();
        }
    }

    function __get($var)
    {
        return $this->$var;
    }
}