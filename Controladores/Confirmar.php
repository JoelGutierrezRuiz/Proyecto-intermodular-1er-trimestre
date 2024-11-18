<?php

$productosCarrito = json_decode(file_get_contents("http://localhost/Ludico/Api/ServicioCarrito/controlador/productosCarrito.php?idCarrito=".$_SESSION['idUnico']));
$productosInfoFinal = [];






include "../Vistas/mostrarConfirmar.php";


?>