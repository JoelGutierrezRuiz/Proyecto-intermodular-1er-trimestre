<!doctype html>
<html lang="en">

<head>
    <title>Lúdico</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS     -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Todos los CSS-->
    <link rel="stylesheet" href="../Css/header.css">
    <link rel="stylesheet" href="../Css/portada.css">
    <link rel="stylesheet" href="../Css/bannerMarcas.css">
    <link rel="stylesheet" href="../Css/seccionProductos.css">
    <link rel="stylesheet" href="../Css/categoriasPortada.css">
    <link rel="stylesheet" href="../Css/footer.css">

    <!--Fonts y Icons-->
    <link href="../Css/global.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">


        <?php include "header.php" ?>
        <?php include "portada.php" ?>
        <?php include "marcasColab.php" ?>
        <?php
        $categoria="familiar"; include "seccion.php" 
        ?>
        <?php include "categorias.php" ?>

        <?php
        $categoria="infantil"; include "seccion.php" 
        ?>


    </div>
    <?php include "footer.php" ?>



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