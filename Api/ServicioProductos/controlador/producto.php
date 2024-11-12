<?php
include "../config/autocarga.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$db = new Db();

if($_SERVER["REQUEST_METHOD"]=="GET"){

    if(isset($_GET["nombre"])){
        $producto = new Producto("","",$_GET["nombre"]);
        header("HTTP/1.1 211 OK");
        echo json_encode( $producto->buscarNombre($db->link));
    }
    else{
        echo "false";
    }

}


if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($body->nombre) && isset($body->foto) && isset($body->descrip)){
        $producto = new Producto(null,$body->nombre,$body->foto,$body->descrip);
        header("HTTP/1.1 211 OK");
        echo json_encode( $producto->insertar($db->link));
    }


}

if($_SERVER["REQUEST_METHOD"]=="PUT"){
    return false;
}

if($_SERVER["REQUEST_METHOD"]=="DELETE"){
    return false;
}