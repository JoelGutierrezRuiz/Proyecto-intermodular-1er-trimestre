<?php

class Producto
{
    private $idProducto;
    private $nombre;
    private $descrip;
    private $foto;
    private $precio;
    private $categoria;

    public function __construct($idProducto = '', $nombre = '', $descrip = '', $foto = '', $precio = '', $categoria = '')
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descrip = $descrip;
        $this->foto = $foto;
        $this->precio = $precio;
        $this->categoria = $categoria;
    }

    static function getAll($link){
        $query = 'SELECT * FROM productos';
        $result = $link->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarId($link)
    {
        $query = 'SELECT * FROM productos WHERE idProducto=:idProducto';
        $result = $link->prepare($query);
        $result->bindParam(":idProducto", $this->idProducto);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public function buscarNombre($link)
    {
        $query = 'SELECT * FROM productos WHERE lower(nombre) like :nombre';
        $result = $link->prepare($query);
        $nombreBusqueda = strtolower($this->nombre . "%");
        $result->bindParam(':nombre', $nombreBusqueda, PDO::PARAM_STR);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarCategoria($link)
    {
        $query = 'SELECT * FROM productos WHERE categoria=:categoria';
        $result = $link->prepare($query);
        $result->bindParam(":categoria", $this->categoria);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($link)
    {
        $query = 'INSERT INTO productos (nombre,foto,categoria,descrip,precio) values (:nombre,:foto,:categoria,:descrip,:precio)';
        $result = $link->prepare($query);
        $result->bindParam(":nombre", $this->nombre);
        $result->bindParam(":foto", $this->foto);
        $result->bindParam(":categoria", $this->categoria);
        $result->bindParam(":descrip", $this->descrip);
        $result->bindParam(":precio", $this->precio);
        return $result->execute();
    }
    
}