<?php

class Cliente{

    private $nombre;
    private $direccion;
    private $email;
    private $pwd;
    private $administrador;

    function __construct($email,$pwd='',$nombre='',$direccion='',$administrador=''){
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->administrador = $administrador;
    }

    function validar($link){
        try{
            $query = "SELECT pwd from clientes where email=:email";
            $result = $link->prepare($query);
            $result->bindParam(":email",$this->email);
            $result->execute();
            $cliente=$result->fetch(PDO::FETCH_ASSOC);
            //Si se ha encontrado y la contraseña es correcta
            if(isset($cliente['pwd'])){
                return password_verify($this->pwd,$cliente['pwd']);
            }
            //En caso contrario
            else{
                return false;
            }
        }
        catch(PDOException $e){
            return $e->getMessage();
            die();
        }
    }


    function existe($link){
        try{
            $query = "SELECT count(email) as cantidad from clientes where email=:email";
            $result = $link->prepare($query);
            $result->bindParam(":email",$this->email);
            $result->execute();
            $cantidad = $result->fetch(PDO::FETCH_ASSOC);
            //devuelva cantidad, al ser email clave primaria solo puede se 0 o 1
            return $cantidad["cantidad"];
        }
        catch(PDOException $e){
            return $e->getMessage();
            die();
        }
    }



    //Esta función sirve para recibir la información del usuario sin exponer su hash, solo se puede acceder si el cliente conoce su email.
    function buscar($link){
        try{
            $query = "SELECT nombre,direccion from clientes where email=:email";
            $result = $link->prepare($query);
            $result->bindParam(":email",$this->email);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            return $e->getMessage();
            die();
        }
    }


    static function getAll($link){
        try{
            $query = "SELECT * from clientes";
            $result = $link->prepare($query);
            $result->execute();
            return $result->fetchAll();
        }
        catch(PDOException $e){
            return "Error: ".$e->getMessage();
            die();
        }
    }
    

    function insert($link){
        try{
            $pwdHash = password_hash($this->pwd,PASSWORD_DEFAULT);
            $query = "INSERT INTO clientes VALUES (:nombre,:direccion,:email,:pwd,0)";
            $result = $link->prepare($query);
            $result->bindParam(':nombre',$this->nombre);
            $result->bindParam(':direccion',$this->direccion);
            $result->bindParam(':email',$this->email);
            $result->bindParam(':pwd',$pwdHash);
            return $result->execute();
        }
        catch(PDOException $e){
            return $e->getMessage();
            die();
        }
    }

    function delete($link){
        try{
            $query = "DELETE from clientes where email=:email";
            $result = $link->prepare($query);
            $result->bindParam(":email",$this->email);
            $result->execute();
            return "Usuario con dni:".$this->email." eliminado";
        }
        catch(PDOException $e){
            return $e->getMessage();
            exit();
        }
    }

}