<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$db = new Db();
$body=json_decode( file_get_contents("php://input"),true);


if($_SERVER["REQUEST_METHOD"]=="GET"){

    if(isset($_GET["nombre"])){

        $producto = new Producto("",$_GET["nombre"]);
        header("HTTP/1.1 211 OK");
        echo json_encode( $producto->buscarNombre($db->link));
    }

    if(isset($_GET["categoria"])){
        $producto = new Producto("","","","","",$_GET["categoria"]);
        //echo var_dump($producto);
        header("HTTP/1.1 211 OK");
        echo json_encode( $producto->buscarCategoria($db->link));
    }

}


if($_SERVER["REQUEST_METHOD"]=="POST"){

    $camposDeInsercion = ["nombre","foto","descrip","precio","categoria"];

    if(comprobadorDeCampos($body,$camposDeInsercion)){
        $producto = new Producto(null,$body["nombre"],$body["descrip"],$body["foto"],$body["precio"],$body["categoria"]);
        header("HTTP/1.1 211 OK");
        echo json_encode( $producto->insertar($db->link));
    }
    else{
        header("HTTP/1.1 206 OK");
        echo "Rellena todos los campos";
    }


}

if($_SERVER["REQUEST_METHOD"]=="PUT"){
    return false;
}

if($_SERVER["REQUEST_METHOD"]=="DELETE"){
    return false;
}