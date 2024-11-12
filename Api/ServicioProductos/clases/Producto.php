<?php

class Producto
{

    private $idProducto;
    private $nombre;
    private $descrip;
    private $foto;
    private $precio;
    private $categoria;

    public function __construct($idProducto = '', $nombre = '', $descrip = '', $foto = '', $precio = '',$categoria='')
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descrip = $descrip;
        $this->foto = $foto;
        $this->precio = $precio;
        $this->categoria = $categoria;
    }

    public function buscarNombre($link)
    {
        try {
            $query = 'SELECT * FROM productos WHERE nombre=:nombre';
            $result = $link->prepare($query);
            $result->bindParam(":nombre", $this->nombre);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function buscarCategoria($link)
    {
        try {
            $query = 'SELECT * FROM productos WHERE categoria=:categoria';
            $result = $link->prepare($query);
            $result->bindParam(":categoria", $this->categoria);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


    

    public function insertar($link)
    {
        try{
            $query = 'INSERT INTO productos (nombre,foto,categoria,descrip,precio) values (:nombre,:foto,:categoria,:descrip,:precio)';
            $result = $link->prepare($query);
            $result->bindParam(":nombre",$this->nombre);
            $result->bindParam(":foto",$this->foto);
            $result->bindParam(":categoria",$this->categoria);
            $result->bindParam(":descrip",$this->descrip);
            $result->bindParam(":precio",$this->precio);
            return $result->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }



}