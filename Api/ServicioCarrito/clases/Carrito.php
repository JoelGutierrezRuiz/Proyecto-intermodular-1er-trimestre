<?php

class Carrito
{

    private $idCarrito;
    private $email;
    private $idProducto;
    private $cantidad;

    public function __construct($idCarrito = "", $email = "", $idProducto = "", $cantidad = "")
    {
        $this->idCarrito = $idCarrito;
        $this->email = $email;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }

    public function existe($link)
    {
        try {
            $query = "SELECT count(idCarrito) as cantidad FROM Carritos where idCarrito = :idCarrito";
            $result = $link->prepare($query);
            $result->bindParam(":idCarrito", $this->idCarrito);
            $result->execute();
            $cantidad = $result->fetch(PDO::FETCH_ASSOC);
            return $cantidad["cantidad"];

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function crearCarrito($link)
    {
        try {
            $query = "INSERT INTO Carritos (idCarrito,email) values (:idCarrito,:email)";
            $result = $link->prepare($query);
            $result->bindParam(":idCarrito", $this->idCarrito);
            $result->bindParam(":email", $this->email);
            return $result->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    //Tenemos que utilizar el metodo para modificar las varirables que queremos
    public function modificar($link){
        $query = "UPDATE Carritos set email = :email where idCarrito = :idCarrito";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->bindParam(":email", $this->email);
        return $result->execute();
    }

}


