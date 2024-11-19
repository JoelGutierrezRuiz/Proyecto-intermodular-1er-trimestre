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
        if (isset($body['email'])) {
            $post = new Cliente($body["email"]);
            header("HTTP/1.1 200 OK");
            echo json_encode($post->buscar($db->link));
            exit();
        } else {
            header("HTTP/1.1 200 OK");
            echo json_encode(Cliente::getAll($db->link));
            exit();
        }
    } catch (Exception $e) {
        responderConError($e->getMessage());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Estos son los campos que tienen que no pueden ser una cadena vacia ni nulos
    //Isset comprueba que existe el campo pero deja pasar una cadena vacia
    //Generando un problema al insertarlo en la base de datos ya que un not null puede tener un string vacio
    //Esta funcion comprueba que todos los campos tienen un valor (faltaria comprobar en el servidor el email ya que en thunder se puede enviar caulquier email)
    $camposDeRegistro = ['email', 'nombre', 'pwd', 'direccion'];
    $camposValidacion = ['email', 'pwd'];

    try {
        //Si tenemos todos los campos necesarios para registrar procedemos a comprobar si existe el usuario
        if (comprobadorDeCampos($body, $camposDeRegistro)) {
            $cliente = new Cliente($body["email"], $body['pwd'], $body['nombre'], $body['direccion']);
            $found = $cliente->existe($db->link);

            //Si existe se devuelve un false al cliente
            if ($found) {
                header("HTTP/1.1 200 OK");
                echo json_encode(false);
            } else {
                // Si no existe, intentar crear el usuario
                iniciarTransaccion();
                $creado = $cliente->insert($db->link);
                confirmarTransaccion();
                header("HTTP/1.1 200 OK");
                echo json_encode($creado);
            }
        }
        // En caso de que solo se reciba email y pwd para validar al usuario
        else if (comprobadorDeCampos($body, $camposValidacion) && count($body) == 2) {
            $cliente = new Cliente($body['email'], $body['pwd']);
            $validado = $cliente->validar($db->link);
            header("HTTP/1.1 200 OK");
            echo json_encode($validado);
            exit();
        }
        // Si no se han proporcionado los campos necesarios
        else {
            header("HTTP/1.1 200 OK");
            echo json_encode(false);
        }
    } catch (Exception $e) {
        revertirTransaccion();
        responderConError($e->getMessage());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    try {
        if (isset($body['email'])) {
            $post = new Cliente($body["email"]);
            header("HTTP/1.1 200 OK");
            echo json_encode($post->delete($db->link));
            exit();
        }
    } catch (Exception $e) {
        responderConError($e->getMessage());
    }
}
