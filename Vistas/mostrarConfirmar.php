<?php

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Css/colores.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/confirmar.css">
</head>

<body>


    <div class="container-fluid">



        <table class="mostrar-pedido">

            <thead>
                <td colspan="5">Confirmar compra</td>
            </thead>


            <tr>
                <td></td>

                <td>Nombre</td>

                <td>Cantidad</td>

                <td>Precio</td>
            </tr>

            <?php

            $totalPedido = 0;
            foreach ($productosCarrito as $linea) {

                $lineaPedido = $linea;
                $prod = json_decode(file_get_contents("http://localhost/Ludico/Api/ServicioProductos/controlador/producto.php?idProducto=" . $linea->idProducto));
                $precioLinea = $prod->precio * $linea->cantidad;
                $totalPedido += $precioLinea;
                echo "
        <tr class='linea-pedido col-12'>
            <td><img src='../Imágenes/juegos/$prod->foto'></td>
            <td><b class='linea-nombre'>$prod->nombre</b></td>
            <td><b class='linea-cantidad'>$linea->cantidad</b></td>
            <td><b class='linea-precio'>$precioLinea €</b></td>
        </tr>
        ";
            }

            ?>

            <tr>
                <td>Total</td>

                <td></td>

                <td>+5€ envío</td>

                <td>
                    <b>
                        <?php
                        echo 5 + $totalPedido . " €"
                            ?>
                    </b>
                </td>
            </tr>

            <tr class="pago-pedido">
                <td colspan="1"><button><a href="VerCarrito.php">Volver</a></button></td>
                <td colspan="4">
                    <form method="POST" action="">
                        <b>Método de pago</b> <input name="tarjeta" type="text"> <button>Pagar</button>
                    </form>
                </td>
            </tr>

        </table>



    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>