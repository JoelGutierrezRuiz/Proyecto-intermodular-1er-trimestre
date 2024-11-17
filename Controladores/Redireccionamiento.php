<?php


    
$urlAceptar = "Validar.php";
$urlCancelar = "VerCarrito.php";
if(isset($_POST["aceptar"])){
    header("location: $urlAceptar");
    exit;
}
else if(isset($_POST["cancelar"])){
    header("location: $urlCancelar");
    exit;
}
else{
include "../Vistas/MensajeDeRedireccion.php";
}
