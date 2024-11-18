<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$db = new Db();
$body = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['idCarrito'])) {
        header("HTTP/1.1 211 OK");
        $producto = new ProductosCarrito($_GET['idCarrito']);
        echo json_encode($producto->buscarTodos($db->link));
    }
}


//Transformarlo en crear carrito
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camposIngresarProd = ["idCarrito", "idProducto", "cantidad"];
    if (comprobadorDeCampos($body, $camposIngresarProd)) {
        $producto = new ProductosCarrito($body["idCarrito"], "", $body["idProducto"], $body["cantidad"]);
        $existe = $producto->existe($db->link);

        header("HTTP/1.1 200 OK");
        if (!$existe) {
            echo json_encode($producto->insertar($db->link));
        } else {
            echo json_encode($producto->añadir($db->link));
        }
    } 
    else if (isset($body['idCarrito'])) {
        header("HTTP/1.1 211 OK");
        $producto = new ProductosCarrito($body['idCarrito']);
        echo json_encode($producto->buscarTodos($db->link));
    }

}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {


    $camposIngresarProd = ["idCarrito", "idProducto", "cantidad"];
    if (comprobadorDeCampos($body, $camposIngresarProd)) {
        $producto = new ProductosCarrito($body["idCarrito"], "", $body["idProducto"], $body["cantidad"]);
        header("HTTP/1.1 200 OK");
        echo json_encode($producto->modificar($db->link));
    } 
    
}

if($_SERVER["REQUEST_METHOD"] == "DELETE") {


    $camposParaEliminar = ["idProducto","idCarrito"];
    if (comprobadorDeCampos($body, $camposParaEliminar)) {
        header("HTTP/1.1 211 OK");
        $producto = new ProductosCarrito($body["idCarrito"],"",$body["idProducto"]);
        echo json_encode($producto->eliminar($db->link));

    }
    else{
        echo json_encode(false);
    }



}