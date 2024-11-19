<?php

include "../config/autocarga.php";
session_start();
$productosCarrito = json_decode(file_get_contents("http://localhost/Ludico/Api/ServicioCarrito/controlador/productosCarrito.php?idCarrito=" . $_SESSION['idUnico']));


$db = new Db();
$user = json_decode(file_get_contents("http://localhost/Ludico/Api/ServicioCliente/controlador/index.php?email=$_SESSION[email]"));

if (isset($_POST["tarjeta"]) && !empty($_POST["tarjeta"])) {
    $pedido = new Pedido($user->direccion, $_POST["tarjeta"], $_SESSION["email"]);
    $idPedido = $pedido->insertar($db->link);
    for ($i = 0; $i < count($productosCarrito); $i++) {
        $lineaPedido = $productosCarrito[$i];
        $lineaPedido = new LineaPedido($idPedido, $i + 1, $lineaPedido->idProducto, $lineaPedido->cantidad);
        $lineaPedido->insertar($db->link);
    }

    header("location:../Vistas/CompraExitosa.php");


} else {
    include "../Vistas/mostrarConfirmar.php";
}

?>