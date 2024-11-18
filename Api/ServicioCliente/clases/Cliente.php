<?php

class Cliente
{

    private $nombre;
    private $direccion;
    private $email;
    private $pwd;
    private $administrador;

    function __construct($email, $pwd = '', $nombre = '', $direccion = '', $administrador = '')
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->administrador = $administrador;
    }

    function validar($link)
    {
        $query = "SELECT pwd from clientes where email=:email";
        $result = $link->prepare($query);
        $result->bindParam(":email", $this->email);
        $result->execute();
        $cliente = $result->fetch(PDO::FETCH_ASSOC);
        //Si se ha encontrado y la contraseña es correcta
        if (isset($cliente['pwd'])) {
            return password_verify($this->pwd, $cliente['pwd']);
        }
        //En caso contrario
        else {
            return false;
        }
    }


    function existe($link)
    {
        $query = "SELECT count(email) as cantidad from clientes where email=:email";
        $result = $link->prepare($query);
        $result->bindParam(":email", $this->email);
        $result->execute();
        $cantidad = $result->fetch(PDO::FETCH_ASSOC);
        //devuelva cantidad, al ser email clave primaria solo puede se 0 o 1
        return $cantidad["cantidad"];

    }



    //Esta función sirve para recibir la información del usuario sin exponer su hash, solo se puede acceder si el cliente conoce su email.
    function buscar($link)
    {
        $query = "SELECT nombre,direccion from clientes where email=:email";
        $result = $link->prepare($query);
        $result->bindParam(":email", $this->email);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }


    static function getAll($link)
    {
        $query = "SELECT * from clientes";
        $result = $link->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }


    function insert($link)
    {
        $pwdHash = password_hash($this->pwd, PASSWORD_DEFAULT);
        $query = "INSERT INTO clientes VALUES (:nombre,:direccion,:email,:pwd,0)";
        $result = $link->prepare($query);
        $result->bindParam(':nombre', $this->nombre);
        $result->bindParam(':direccion', $this->direccion);
        $result->bindParam(':email', $this->email);
        $result->bindParam(':pwd', $pwdHash);
        return $result->execute();
    }

    function delete($link)
    {
        $query = "DELETE from clientes where email=:email";
        $result = $link->prepare($query);
        $result->bindParam(":email", $this->email);
        $result->execute();
    }

}