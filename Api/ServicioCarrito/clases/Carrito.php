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
        $query = "SELECT count(idCarrito) as cantidad FROM carritos where idCarrito = :idCarrito";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->execute();
        $cantidad = $result->fetch(PDO::FETCH_ASSOC);
        return $cantidad["cantidad"];
    }


    public function crearCarrito($link)
    {
        $query = "INSERT INTO carritos (idCarrito,email) values (:idCarrito,:email)";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->bindParam(":email", $this->email);
        return $result->execute();
    }


    //Tenemos que utilizar el metodo para modificar las varirables que queremos
    public function modificar($link)
    {
        $query = "UPDATE carritos set email = :email where idCarrito = :idCarrito";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->bindParam(":email", $this->email);
        return $result->execute();
    }

    
    public function eliminar($link)
    {
        $query = "DELETE FROM carritos where idCarrito = :idCarrito";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        return $result->execute();
    }


}


