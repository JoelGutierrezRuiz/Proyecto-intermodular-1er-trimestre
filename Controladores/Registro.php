<?php

session_start();
if(isset($_SESSION['email']) && isset($_SESION['nombre'])){
    header("location:../index.php");
}
else if(isset($_POST['email-cliente'] )&& isset($_POST['nombre'])){
    $_SESSION['email']= $_POST['email-cliente'];
    $_SESSION['nombre'] = $_POST['nombre'];
    header("location:Principal.php");
}
else{
    include "../Vistas/registro.php";
}

