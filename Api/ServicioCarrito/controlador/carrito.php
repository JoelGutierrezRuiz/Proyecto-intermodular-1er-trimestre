<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$db = new Db();
$body=json_decode( file_get_contents("php://input"),true);


if($_SERVER["REQUEST_METHOD"]=="GET"){

    if(isset($_GET['idUnico'])){
        header("HTTP/1.1 205 OK");
        $carrito = new Carrito($_GET['idUnico']);
        echo json_encode($carrito->buscar($db->link));
    }


}


if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($body["idUnico"])){
        header("HTTP/1.1 205 OK");
        $carrito = new Carrito($body["idUnico"]);
        echo json_encode($carrito->insertar($db->link));
    }




}

if($_SERVER["REQUEST_METHOD"]=="PUT"){
    return false;
}

if($_SERVER["REQUEST_METHOD"]=="DELETE"){

}