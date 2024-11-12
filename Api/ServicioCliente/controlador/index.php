<?php
include "../config/autocarga.php";
include "../../funciones/comprobadores.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$db = new Db();
$body = json_decode(file_get_contents("php://input"), true);

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($body['email'])) {
        $post = new Cliente($body["email"]);
        header("HTTP/1.1 200 OK");
        echo json_encode($post->buscar($db->link));
        exit();
    }
    else {
        header("HTTP/1.1 200 OK");
        echo json_encode(Cliente::getAll($db->link));
        exit();
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Estos son los campos que tienen que no pueden ser una cadena vacia ni nulos
    //Isset comprueba que existe el campo pero deja pasar una cadena vacia
    //Generando un problema al insertarlo en la base de datos ya que un not null puede tener un string vacio
    //Esta funcion comprueba que todos los campos tienen un valor (faltaria comprobar en el servidor el email ya que en thunder se puede enviar caulquier email)
    $camposDeRegistro = ['email','nombre','pwd','direccion'];
    $camposValidacion = ['email','pwd'];


    if(comprobadorDeCampos($body,$camposDeRegistro)){
        $post = new Cliente($body["email"],$body['pwd'],$body['nombre'],$body['direccion']);
        header("HTTP/1.1 200 OK");
        echo json_encode($post->insert($db->link));
        exit();
    }
    
    else if(isset($body,$camposValidacion)){
        $post = new Cliente($body['email'],$body['pwd']);
        header("HTTP/1.1 201 OK");
        echo json_encode($post->validar($db->link));
        exit();
    }
}

if($_SERVER["REQUEST_METHOD"]=="DELETE"){
    if(isset($body['email'])){
        $post = new Cliente($body["email"]);
        header("HTTP/1.1 200 OK");
        echo json_encode($post->delete($db->link));
        exit();
    }
}