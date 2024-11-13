<?php

class Carrito
{

    private $idUnico;
    private $email;
    private $idProducto;
    private $cantidad;

    public function __construct($idUnico = "", $email = "", $idProducto = "", $cantidad = "")
    {
        $this->idUnico = $idUnico;
        $this->email = $email;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;
    }

    public function buscar($link)
    {
        try {
            $query = "SELECT * FROM Carritos where idCarrito = :idUnico";
            $result = $link->prepare($query);
            $result->bindParam(":idUnico", $this->idUnico);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function insertar($link)
    {
        $carrito = $this->buscar($link);
        if(!$carrito){
            echo "no se encuentra";
            $query = "INSERT INTO Carritos (idCarrito,email) values (:idUnico,:email)";
            $result = $link->prepare($query);
            $result->bindParam(":idUnico",$this->idUnico);
            $result->bindParam(":email",$this->email);
        }
        $query= "INSERT INTO CarritoProductos values (:idUnico,:IdProducto,:Cantidad)";
        $result = $link->prepare($query);
        $result->binParam(":idUnico",$this->idUnico)



    }

    public function modificar()
    {
        return false;
    }








}