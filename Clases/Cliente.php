<?php

class Cliente{

    private $nombre;
    private $direccion;
    private $email;
    private $pwd;
    private $administrador;

    function __construct($email=null,$pwd=null,$nombre=null,$direccion=null,$administrador=null){
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->administrador = $administrador;
    }

    function validar($link){
        try{
            $cliente = $this->buscar($link);
            if(isset($cliente['pwd'])){
                if(password_verify($this->pwd,$cliente['pwd'])){
                    return $cliente;
                } 
            }
            return false;
        }
        catch(PDOException $e){
            return $e->getCode();
            die();
        }
    }

    function buscar($link){
        try{
            $query = "SELECT * from clientes where email=:email";
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
            return $e->getMessage();
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
            return $e->getCode();
            exit();
        }
    }

}