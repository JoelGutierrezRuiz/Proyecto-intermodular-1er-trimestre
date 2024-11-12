<?php
session_start();
//unset($_SESSION["email"]);
//unset($_SESSION["nombre"]);
if (isset($_SESSION['email'])) {
    echo $_SESSION['email'] . ' --> ' . $_SESSION['nombre'];
} else {
    echo "No has iniciado sesion";
}


?>
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

                <input class="cabecera-buscador-input d-md-block d-none"
                    placeholder="Encuentra el juego perfecto para tí..." type="text">

                <a href="../Vistas/productos.html">
                    <span class="cabecera-buscador-icono material-symbols-rounded" id="lupa">
                        search
                    </span>
                </a>

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


            <div id="opciones-emergente">



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


        <div class="portada-inicio row">

            <div class="portada-texto order-2 order-xl-1 col-12 col-xl-5 offset-xl-1">
                <h2>¡Celebra la Magia de la Navidad en Familia! </h2>
                <p>Estas fiestas, convierte cada reunión familiar en una aventura inolvidable con nuestra cuidada
                    selección de juegos de mesa.</p>
            </div>

            <div class="portada-boton order-3 order-xl-2 col-12 col-xl-3">
                <button>
                    Explora
                </button>
            </div>
            <img src="../Imágenes/portadas/familiaPortada.png"
                class="portada-img order-xl-3 img-mobile col-12 col-xl-2">
        </div>


        <div class="marcas-contenedor row">

            <p class="marcas-texto col-10 offset-1">Las Mejores Marcas de Juegos, ¡Todo en Un Solo Lugar!</p>


            <div class="marcas-imgs col-12 col-xl-8 offset-xl-2">
                <img alt="hasbro-logo" src="../Imágenes/marcas/hasbro.jpg ">
                <img alt="mattel-logo" src="../Imágenes/marcas/Mattel.png">
                <img alt="ravensburger-logo" src="../Imágenes/marcas/ravensburger.png">
                <img alt="asmodee-logo" src="../Imágenes/marcas/asmode.jpg">
                <img alt="jumbo-logo" src="../Imágenes/marcas/jumbo.png">
            </div>

        </div>


        <div class="seccion-contenedor row">

            <div class="seccion-productos col-xl-8 offset-xl-2 col-12 ">

                <p class="seccion-titulo row">Lo más vendido</p>

                <div class="seccion-productos-imagenes row">

                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <a href="../Vistas/verProducto.html">
                            <img class="img-fluid" src="../Imágenes/juegos/monopoly.png">
                        </a>
                        <p>monopoly</p>
                        <p>25$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <a href="">
                            <img class="img-fluid" src="../Imágenes/juegos/parchis.png">
                        </a>
                        <p>Parchís</p>
                        <p>15$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <a href="">
                            <img class="img-fluid" src="../Imágenes/juegos/parchis.png">
                        </a>
                        <p>Pictionary</p>
                        <p>13$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <a href="">
                            <img class="img-fluid" src="../Imágenes/juegos/parchis.png">
                        </a>
                        <p>Rummy</p>
                        <p>10$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <a href="">
                            <img class="img-fluid" src="../Imágenes/juegos/parchis.png">
                        </a>
                        <p>Uno</p>
                        <p>7$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4 col-xl-2">
                        <a href="">
                            <img class="img-fluid" src="../Imágenes/juegos/parchis.png">
                        </a>
                        <p>Parchís</p>
                        <p>15$</p>
                    </div>
                </div>

                <p class="seccion-vermas row"><a href="">Ver más</a></p>

            </div>

        </div>


        <div class="categorias-portada-contenedor row">

            <div class="categorias-portada col-8 offset-2">

                <div class="categorias-portada-titulo">
                    <h3>¡Elige tu Aventura!</h3>
                    <b>Descubre nuestras categorías de juegos de mesa</b>
                </div>

                <div class="categorias-portada-imgs row">

                    <div class=" col-12 col-xl-4">
                        <p>Familiares</p>
                        <img src="../Imágenes/portadas/familia.webp">
                    </div>


                    <div class="col-12 col-xl-4">
                        <p>Infantiles</p>
                        <img src="../Imágenes/portadas/infantil.jpg">
                    </div>


                    <div class="col-12 col-xl-4">
                        <p>Estrategia</p>
                        <img src="../Imágenes/portadas/estrategia.webp">
                    </div>

                </div>



            </div>

        </div>


        <div class="seccion-contenedor row">

            <div class="seccion-productos col-xl-8 offset-xl-2 col-12 ">



                <p class="seccion-titulo row">Lo más vendido</p>

                <div class="seccion-productos-imagenes row">

                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <img class="img-fluid" src="../Imágenes/juegos/monopoly.png">
                        <p>monopoly</p>
                        <p>25$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <img class="img-fluid" src="../Imágenes/juegos/parchis.png">
                        <p>Parchís</p>
                        <p>15$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <img class="img-fluid" src="../Imágenes/juegos/pictionary.jpg">
                        <p>Pictionary</p>
                        <p>13$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <img class="img-fluid" src="../Imágenes/juegos/rumy.jpg">
                        <p>Rummy</p>
                        <p>10$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4  col-xl-2">
                        <img class="img-fluid" src="../Imágenes/juegos/uno.jpg">
                        <p>Uno</p>
                        <p>7$</p>
                    </div>


                    <div class="seccion-productos-imagen col-6 col-md-4 col-xl-2">
                        <img class="img-fluid" src="../Imágenes/juegos/parchis.png">
                        <p>Parchís</p>
                        <p>15$</p>
                    </div>
                </div>

                <p class="seccion-vermas row"><a href="">Ver más</a></p>

            </div>

        </div>


    </div>

    <div class="container-fluid">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-body-secondary">© 2024 Company, Inc</span>
            </div>

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
        </footer>
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
    <script src="../Js/principal.js"></script>
</body>

</html>