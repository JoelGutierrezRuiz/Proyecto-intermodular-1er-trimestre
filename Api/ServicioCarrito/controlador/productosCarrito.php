<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$db = new Db();
$body = json_decode(file_get_contents("php://input"), true);

function iniciarTransaccion() {
    global $db;
    $db->link->beginTransaction();
}

function confirmarTransaccion() {
    global $db;
    $db->link->commit();
}

function revertirTransaccion() {
    global $db;
    $db->link->rollBack();
}

function responderConError($error) {
    header("HTTP/1.1 500 Internal Server Error");
    echo json_encode(["error" => $error]);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        if (isset($_GET['idCarrito'])) {
            header("HTTP/1.1 211 OK");
            $producto = new ProductosCarrito($_GET['idCarrito']);
            echo json_encode($producto->buscarTodos($db->link));
        }
    } catch (Exception $e) {
        responderConError($e->getMessage());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $camposIngresarProd = ["idCarrito", "idProducto", "cantidad"];
        if (comprobadorDeCampos($body, $camposIngresarProd)) {
            $producto = new ProductosCarrito($body["idCarrito"], "", $body["idProducto"], $body["cantidad"]);
            $existe = $producto->existe($db->link);

            iniciarTransaccion();
            header("HTTP/1.1 200 OK");

            if (!$existe) {
                echo json_encode($producto->insertar($db->link));
            } else {
                echo json_encode($producto->añadir($db->link));
            }
            confirmarTransaccion();
        } else if (isset($body['idCarrito'])) {
            header("HTTP/1.1 211 OK");
            $producto = new ProductosCarrito($body['idCarrito']);
            echo json_encode($producto->buscarTodos($db->link));
        }
    } catch (Exception $e) {
        revertirTransaccion();
        responderConError($e->getMessage());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    try {
        $camposIngresarProd = ["idCarrito", "idProducto", "cantidad"];
        if (comprobadorDeCampos($body, $camposIngresarProd)) {
            $producto = new ProductosCarrito($body["idCarrito"], "", $body["idProducto"], $body["cantidad"]);

            iniciarTransaccion();
            header("HTTP/1.1 200 OK");
            echo json_encode($producto->modificar($db->link));
            confirmarTransaccion();
        }
    } catch (Exception $e) {
        revertirTransaccion();
        responderConError($e->getMessage());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    try {
        $camposParaEliminar = ["idProducto", "idCarrito"];
        if (comprobadorDeCampos($body, $camposParaEliminar)) {
            header("HTTP/1.1 211 OK");
            $producto = new ProductosCarrito($body["idCarrito"], "", $body["idProducto"]);

            iniciarTransaccion();
            echo json_encode($producto->eliminar($db->link));
            confirmarTransaccion();
        } else {
            echo json_encode(false);
        }
    } catch (Exception $e) {
        revertirTransaccion();
        responderConError($e->getMessage());
    }
}
