<?php
session_start();
//unset($_SESSION["email"]);
//unset($_SESSION["nombre"]);
if (isset($_SESSION['email'])) {
    echo $_SESSION['email'] . ' --> ' . $_SESSION['nombre'];
} else {
    echo "No has iniciado sesion";
}

include "../Vistas/principal.html";
