<?php

session_start();
if(!isset(($_SESSION["producto"]))){
    $_SESSION["producto"]="";
}



//no dejar pasar canrtidades incorrectas (ya se comprueba en el cliente pero para mayor seguridad se hace tambien en el servidor)
if(isset($_POST["id-producto"])&&isset($_POST["producto-cantidad"]) && isset($_POST["precio-producto"]) && isset($_POST["nombre-producto"])  && isset($_POST["foto-producto"])){
    

    //Creacion de producto
    $producto = [
        'id' => $_POST["id-producto"],
        'nombre' => $_POST["nombre-producto"],
        'precio' => $_POST["precio-producto"],
        'cantidad' => $_POST["producto-cantidad"],
        'foto'=> $_POST['foto-producto']
    ];

    $_SESSION["producto"] = $producto;

    //Redireccionamiento
    header("location:VerCarrito.php");
}
else{

    include "../Vistas/verProducto.php";

}