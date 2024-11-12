<?php

class Producto
{

    private $idProducto;
    private $nombre;
    private $descrip;
    private $foto;
    private $precio;
    private $marca;

    public function __construct($idProducto = '', $nombre = '', $descrip = '', $foto = '', $precio = '',$marca='')
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descrip = $descrip;
        $this->foto = $foto;
        $this->precio = $precio;
        $this->marca = $marca;
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

    

    public function insertar($link)
    {
        try{
            $query = 'INSERT INTO productos (nombre,foto,marca,descrip,precio) values (:nombre,:foto,:marca,:descrip,:precio)';
            $result = $link->prepare($query);
            $result->bindParam(":nombre",$this->nombre);
            $result->bindParam(":foto",$this->foto);
            $result->bindParam(":marca",$this->marca);
            $result->bindParam(":descrip",$this->descrip);
            $result->bindParam(":precio",$this->precio);
            return $result->execute();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }



}