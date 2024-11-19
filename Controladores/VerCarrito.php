<?php
session_start();
//Crear un carrito general y agragar setters
if(!isset($_SESSION['idUnico'])) {
    $_SESSION['idUnico'] = uniqid();
}

if(isset($_POST["confirmar"]) && isset($_SESSION['email'])) {
    header("location:Confirmar.php");
}
else if(isset($_POST["confirmar"]) && !isset($_SESSION["email"])){
    header("location:Redireccionamiento.php");
}
else{
    include  "../Vistas/verCarrito.php";
}

