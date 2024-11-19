<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$db = new Db();
$body = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        if (isset($_GET["nombre"])) {
            $producto = new Producto("", $_GET["nombre"]);
            header("HTTP/1.1 211 OK");
            echo json_encode($producto->buscarNombre($db->link));
        }

        if (isset($_GET["categoria"])) {
            $producto = new Producto("", "", "", "", "", $_GET["categoria"]);
            header("HTTP/1.1 211 OK");
            if ($_GET["categoria"] == "todos") {
                echo json_encode(Producto::getAll($db->link));
            } else {
                echo json_encode($producto->buscarCategoria($db->link));
            }
        }

        if (isset($_GET["idProducto"])) {
            $producto = new Producto($_GET["idProducto"]);
            header("HTTP/1.1 211 OK");
            echo json_encode($producto->buscarId($db->link));
        }

    } catch (Exception $e) {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(["error" => $e->getMessage()]);
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $camposDeInsercion = ["nombre", "foto", "descrip", "precio", "categoria"];

        if (comprobadorDeCampos($body, $camposDeInsercion)) {
            $producto = new Producto(null, $body["nombre"], $body["descrip"], $body["foto"], $body["precio"], $body["categoria"]);

            // Iniciar la transacción
            $db->link->beginTransaction();

            // Insertar el producto en la base de datos
            $resultado = $producto->insertar($db->link);

            // Si la inserción es exitosa, confirmar la transacción
            $db->link->commit();

            header("HTTP/1.1 211 OK");
            echo json_encode($resultado);

        } else {
            header("HTTP/1.1 206 OK");
            echo "Rellena todos los campos";
        }

    } catch (Exception $e) {
        // Si ocurre un error, revertir la transacción
        $db->link->rollBack();

        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(["error" => $e->getMessage()]);
    }

}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    return false;
}
