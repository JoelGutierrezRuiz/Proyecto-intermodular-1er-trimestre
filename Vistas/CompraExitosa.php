<?php
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <script>

        let idUnico = <?php
        if (isset($_SESSION["idUnico"])) {
            echo json_encode($_SESSION["idUnico"]);
        } else {
            echo json_encode("");
        }
        ?>;



        let url = "http://localhost/Ludico/Api/ServicioCarrito/controlador/carrito.php";

        let body = {
            "idCarrito":idUnico
        }

        let header = {
            "method": "DELETE",
            "headers": { "Content-Type": "aplication/json" },
            "body": JSON.stringify(body)
        }

        fetch(url,header);



    </script>

    <div class="modal show" tabindex="-1" id="myModal" role="dialog" aria-hidden="false" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recordatorio</h5>
                </div>
                <div class="modal-body">
                    <p>Tu compra ha sido realizada con exito!</p>
                </div>
                <form method="POST" class="modal-footer" action="../Controladores/Principal.php">
                    <button type="submit" name="aceptar" class="btn btn-primary">Aceptar</button>
                </form>
            </div>
        </div>
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