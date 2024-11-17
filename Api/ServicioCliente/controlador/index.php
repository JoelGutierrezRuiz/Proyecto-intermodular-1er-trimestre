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


    //Si tenemos todos los campos necesarios para registrar procedemos a comprobar si existe el usuario
    if(comprobadorDeCampos($body,$camposDeRegistro)){
        $cliente = new Cliente($body["email"],$body['pwd'],$body['nombre'],$body['direccion']);
        $found = $cliente->existe($db->link);
        
        //Si existe se devuelve un false al cliente
        if($found){
            header("HTTP/1.1 200 OK");
            echo json_encode(false);
        }
        //En otro caso se intenta crear el usuario
        else{
            $creado = $cliente->insert($db->link);
            header("HTTP/1.1 200 OK");
            echo json_encode($creado);
        }
    }
    //En caso de no tener todos los campos de registro pero si tiene los campos de pwd y email (ojo que este mismo servicio se llama desde registro y usuario) y solo contar con dos campos-
    //se procedera a validar el usuario y dependiendo de la respuesta el cliente hará un u otra cosa.
    else if(comprobadorDeCampos($body,$camposValidacion) && count($body)==2){
        $cliente = new Cliente($body['email'],$body['pwd']);
        $validado = $cliente->validar($db->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($validado);
        exit();
    }
    //Si no se ha podido registrar y los campos no son correctos enviamos un false indicando que algo no ha ido bien, (el cliente se encarga de mostrar que es lo que quiere el servidor)
    else{
        header("HTTP/1.1 200 OK");
        echo json_encode(false);
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