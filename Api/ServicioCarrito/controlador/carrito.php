<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$db = new Db();
$body = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($body['idCarrito'])) {
        header("HTTP/1.1 200 OK");
        $carrito = new Carrito($body['idCarrito']);
        $existe = $carrito->existe($db->link);
        if ($existe) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camposIngresarProd = ["idCarrito"];
    $carrito = new Carrito($body["idCarrito"], "");
    $existe = $carrito->existe($db->link);

    if (!$existe && comprobadorDeCampos($body, $camposIngresarProd)) {
        header("HTTP/1.1 200 OK");
        echo json_encode($carrito->crearCarrito($db->link));
    } else {
        header("HTTP/1.1 200 OK");
        echo json_encode(false);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $camposIngresarProd = ["idCarrito","email"];
    $carrito = new Carrito($body["idCarrito"],$body["email"]);
    header("HTTP/1.1 200 OK");
    echo json_encode($carrito->modificar($db->link));
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    return false;
}