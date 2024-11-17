<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS     -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Todos los CSS-->
    <link rel="stylesheet" href="../Css/header.css">
    <link rel="stylesheet" href="../Css/footer.css">
    <link href="../Css/verProducto.css" rel="stylesheet">

    <!--Fonts y Icons-->
    <link href="../Css/global.css" rel="stylesheet">

<body>


    <div class="container-fluid">



        <div class="promocion-envio row">
            <p class="col-12">ENVÍO GRATUITO A PARTIR DE 45$ DE COMPRA</p>
        </div>

        <div class="cabecera-contenedor row">

            <div class="logo-contenedor col-6  col-md-3   col-xl-2 offset-xl-2 ">
                <span id="menu" class="material-symbols-rounded d-sm-block  d-xl-none">
                    menu
                </span>


                <h1 class="logo-name">
                    <a href="../Controladores/Principal.php">
                        Lúdico
                    </a>
                </h1>

                <a href="../Controladores/Principal.php">
                    <img class="logo-img  tamaño-logo-movil" src="../Imágenes/portadas/logo.png">
                </a>


            </div>


            <p class="listaCategorias d-none d-xl-block col-2 col-xl-1">Categorías</p>

            <div class="cabecera-buscador-contenedor col-6 col-md-9 col-xl-7">

                <input id="buscador" class="cabecera-buscador-input d-md-block d-none"
                    placeholder="Encuentra el juego perfecto para tí..." type="text">

                <span class="cabecera-buscador-icono material-symbols-rounded" id="lupa">
                    search
                </span>


                <span id="login" class="material-symbols-rounded d-xl-block d-none">
                    <a href="Validar.php">chess_pawn</a>
                </span>

                <span class="material-symbols-rounded">
                    shopping_cart
                </span>

                <span class="material-symbols-rounded d-xl-block  d-none">
                    language
                </span>

            </div>


            <div class="col-12  buscador-emergente-contenedor d-md-none" id="search-row">
                <div class="buscador-emergente">
                    <input id="buscador" class="cabecera-buscador-input form-control me-2"
                        placeholder="Encuentra el juego perfecto para ti..." type="text" style="max-width: 600px;">
                    <span class="cabecera-buscador-icono material-symbols-rounded" id="lupa" style="cursor: pointer;">
                        search
                    </span>
                </div>
            </div>


            <div id="opciones-emergente" class="d-none">



                <span class="material-symbols-rounded" id="closeOptions">close</span>


                <ul class="opciones-lista">
                    <li>Categoriás</li>
                    <select>
                        <option>De risa</option>
                        <option>Famioptionres</option>
                        <option>Infantiles</option>
                        <option>Memoria y atención</option>
                        <option>Infantiles</option>
                        <option>Fiesta</option>
                    </select>

                    <li><a href="Validar.php">Mi cuenta</a></li>
                    <li>Novedades</li>

                    <hr>

                    <li>Contacto</li>
                    <li>Sobre nosotros</li>
                    <li>Ayuda</li>


                    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                        <li class="ms-3"><a class="text-body-secondary" href="#"><img
                                    src="../Imágenes/redesSociales/facebook.webp"></a></li>
                        <li class="ms-3"><a class="text-body-secondary" href="#"><img
                                    src="../Imágenes/redesSociales/gmail.webp"></a></li>
                        <li class="ms-3"><a class="text-body-secondary" href="#"><img
                                    src="../Imágenes/redesSociales/instagram.webp"></a></li>
                        <li class="ms-3"><a class="text-body-secondary" href="#"><img
                                    src="../Imágenes/redesSociales/telegram.webp"></a></li>
                    </ul>

                </ul>


            </div>



        </div>


        <div class="producto-contenedor row">



            <div class="producto-imagen-contenedor col-12  col-md-5 offset-md-1 col-xl-4 offset-xl-2">
                <img id="producto-imagen" src="../Imágenes/juegos/monopoly.png">
            </div>

            <div class="producto-datos col-12 col-md-5 col-xl-4">
                <h3 id="producto-nombre">Monopoly Classic</h3>
                <p id="producto-categoria">Familiar</p>
                <p id="producto-descripcion">El mejor juego del mundo</p>
                <p id="producto-precio">€</p>
                <form method="POST" onsubmit="addToCart(event)" action="" >
                    <input name="producto-cantidad" id="producto-cantidad" type="number">

                    <input type="hidden" name="id-producto" id="idProducto" value="">
                    <input type="hidden" name="nombre-producto" id="nombre-producto" value="">
                    <input type="hidden" name="precio-producto" id="precio-producto" value="">
                    <input type="hidden" name="foto-producto" id="foto-producto" value="">

                    <button name="añadir-producto" id="producto-boton">
                        <b>Añadir al carrito</b>
                        <span class="material-symbols-rounded">
                            shopping_cart
                        </span>
                    </button>
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

    <script src="../Js/styles/search.js"></script>
    <script src="../Js/verProductos.js"></script>
</body>

</html>