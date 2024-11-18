<?php

session_start();
//unset($_SESSION["email"]);
//unset($_SESSION["nombre"]);
if (isset($_SESSION['email'])) {
   // echo $_SESSION['email'] . ' --> ' . $_SESSION['nombre'];
}
if(isset($_SESSION["idUnico"])){
//echo "<br>sesion--->".$_SESSION['idUnico'];
}
else{
    //echo "sin id";
}
include "../Vistas/principal.php";
