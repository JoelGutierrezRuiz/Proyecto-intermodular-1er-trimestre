<?php

class Pedido {


    private $dirEntrega;
    private $nTarjeta;
    private $email;


    public function __construct($dirEntrega,$nTarjeta,$email) {
        $this->dirEntrega = $dirEntrega;
        $this->nTarjeta = $nTarjeta;
        $this->email = $email;
    }

    static function indiceUltimo($link){
        $query = "SELECT count(idPedido) as indice from pedidos";
        $result = $link->prepare($query);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }


    function insertar($link){

        $idPedido = $this->indiceUltimo($link);
        $indice=$idPedido["indice"]+1;

        $query = "INSERT INTO pedidos (idPedido,dirEntrega,nTarjeta,email) values (:idPedido,:dirEntrega,:nTarjeta,:email)";
        $result = $link->prepare($query);
        $result->bindParam(":dirEntrega",$this->dirEntrega);
        $result->bindParam(":nTarjeta",$this->nTarjeta);
        $result->bindParam(":email",$this->email);
        $result->bindParam(":idPedido",$indice);
        $result->execute();
        return $indice;
    }


}