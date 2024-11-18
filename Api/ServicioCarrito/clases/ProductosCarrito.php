<?php

class ProductosCarrito
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


    public function buscarTodos($link)
    {
        $query = "SELECT * from carritoproductos where idCarrito = :idUnico";
        $result = $link->prepare($query);
        $result->bindParam(":idUnico", $this->idCarrito);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    //Esta funcion puede que sea redundante
    public function existe($link)
    {
        $query = "SELECT count(idCarrito) as cantidad from carritoproductos where idCarrito = :idUnico and idProducto=:idProducto";
        $result = $link->prepare($query);
        $result->bindParam(":idUnico", $this->idCarrito);
        $result->bindParam(":idProducto", $this->idProducto);
        $result->execute();
        $cantidad = $result->fetch(PDO::FETCH_ASSOC);
        return $cantidad["cantidad"];
    }

    public function buscarProductoCarrito($link)
    {
        $query = "SELECT cantidad from carritoproductos where idCarrito = :idCarrito and idProducto=:idProducto";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->bindParam(":idProducto", $this->idProducto);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function añadir($link)
    {
        $cantidad = $this->buscarProductoCarrito($link)["cantidad"];
        if ($cantidad >= 0) {
            $query = "UPDATE carritoproductos SET cantidad = :nuevaCantidad where idCarrito=:idCarrito and idProducto=:idProducto";
            $result = $link->prepare($query);
            $cantidad += $this->cantidad;
            $result->bindParam(":idCarrito", $this->idCarrito);
            $result->bindParam(":idProducto", $this->idProducto);
            $result->bindParam(":nuevaCantidad", $cantidad);
            return $result->execute();
        }
    }
    public function insertar($link)
    {
        $query = "INSERT INTO carritoproductos values (:idCarrito,:idProducto,:cantidad)";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->bindParam(":idProducto", $this->idProducto);
        $result->bindParam(":cantidad", $this->cantidad);
        return $result->execute();
    }

    public function eliminar($link)
    {
        $query = "DELETE FROM carritoproductos where idCarrito=:idCarrito and idProducto=:idProducto";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->bindParam(":idProducto", $this->idProducto);
        return $result->execute();
    }


    public function modificar($link)
    {
        $query = "UPDATE carritoproductos set cantidad = :cantidad where idCarrito = :idCarrito and idProducto=:idProducto";
        $result = $link->prepare($query);
        $result->bindParam(":idCarrito", $this->idCarrito);
        $result->bindParam(":idProducto", $this->idProducto);
        $result->bindParam(":cantidad", $this->cantidad);
        return $result->execute();
    }








}