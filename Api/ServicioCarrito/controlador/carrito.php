<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$db = new Db();
$body = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
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
    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(["error" => $e->getMessage()]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $camposIngresarProd = ["idCarrito"];
        $carrito = new Carrito($body["idCarrito"], "");
        $existe = $carrito->existe($db->link);


        $db->link->beginTransaction();

        if (!$existe && comprobadorDeCampos($body, $camposIngresarProd)) {
            header("HTTP/1.1 200 OK");
            echo json_encode($carrito->crearCarrito($db->link));
            // Confirmar la transacción si todo va bien
            $db->link->commit();
        } else {
            header("HTTP/1.1 200 OK");
            echo json_encode(false);

            $db->link->rollBack();
        }

    } catch (Exception $e) {

        $db->link->rollBack();

        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(["error" => $e->getMessage()]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    try {
        $camposIngresarProd = ["idCarrito", "email"];
        $carrito = new Carrito($body["idCarrito"], $body["email"]);
        

        $db->link->beginTransaction();
        
        header("HTTP/1.1 200 OK");
        echo json_encode($carrito->modificar($db->link));
        
        $db->link->commit();
    } catch (Exception $e) {
        $db->link->rollBack();
        header("HTTP/1.1 500 Internal Server Error");

    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    try{
  
        $camposIngresarProd = ["idCarrito"];
        $carrito = new Carrito($body["idCarrito"]);
        $db->link->beginTransaction();
        header("HTTP/1.1 200 OK");
        echo json_encode($carrito->eliminar($db->link));
                
        $db->link->commit();

    } catch (Exception $e) {
        $db->link->rollBack();
        header("HTTP/1.1 500 Internal Server Error");
    }
}
