<!--Vista header-->
<header class="cabecera-contenedor row">

    <span id="menu" class="material-symbols-rounded col-1 d-sm-block  d-xl-none">
        menu
    </span>

    <div class="logo-contenedor col-4  col-md-3   col-xl-2 offset-xl-2 ">

        <a href="../Controladores/Principal.php">
            <h1 class="logo-name d-none d-sm-block">
                Lúdico
            </h1>
        </a>

        <a href="../Controladores/Principal.php">
            <img class="logo-img  tamaño-logo-movil" src="../Imágenes/portadas/logo.png">
        </a>

    </div>

    <button id="boton-categorias" class=" d-none d-xl-block col-2 col-xl-1">Categorías</button>

    <div class="cabecera-buscador-contenedor col-6 col-md-8 col-xl-7">

        <input id="buscador" class="cabecera-buscador-input d-md-block d-none"
            placeholder="Encuentra el juego perfecto para tí..." type="text">

        <span class="cabecera-buscador-icono material-symbols-rounded d-none d-md-block " id="lupa">
            search
        </span>

        <span class="cabecera-buscador-icono material-symbols-rounded d-md-none" id="abrir-buscador-emergente">
            search
        </span>

        <span id="login" id="abrir-usuario-emergente"class="material-symbols-rounded d-xl-block d-none">
            chess_pawn
        </span>

        <span class="material-symbols-rounded">
            <a href="http://localhost/Ludico/Controladores/VerCarrito.php">
                shopping_cart
            </a>

            <div id="cantidad-carrito"> 2 </div>

            <script>

                const cartPopUp = document.getElementById("cantidad-carrito")
                let idCarrito = <?php
                if (isset($_SESSION["idUnico"])) {
                    echo json_encode($_SESSION["idUnico"]);
                } else {
                    echo json_encode("");
                }
                ?>;

                if (idCarrito) {
                    let url = "http://localhost/Ludico/Api/ServicioCarrito/controlador/productosCarrito.php";
                    let body = {
                        "idCarrito": idCarrito
                    }
                    let header = {
                        "method": "POST",
                        "headers": { "Content-Type": "aplication/json" },
                        "body": JSON.stringify(body)
                    };
                    let response = fetch(url, header)
                        .then((res) => res.json())
                        .then((res) => {
                            cartPopUp.innerHTML= res.length;
                            if (res.length > 0) {
                                cartPopUp.style.display = "flex";
                            }
                            else {
                                cartPopUp.style.display = "none";
                            }
                        });
                }




            </script>

        </span>

        <span class="material-symbols-rounded d-xl-block  d-none">
            language
        </span>

    </div>

    <div class="d-none" id="buscador-emergente-contenedor">
        <div class="buscador-emergente">
            <input id="buscador-input-emergente" class="cabecera-buscador-input form-control me-2"
                placeholder="Encuentra el juego perfecto para ti..." type="text" style="max-width: 600px;">
            <span class="cabecera-buscador-icono material-symbols-rounded" id="lupa-emergente" style="cursor: pointer;">
                search
            </span>

        </div>
    </div>






    


    <div class="d-none" id="lista-categorias">
        <ol>
            <b><a href="../Vistas/productos.php?categoria=familiar">Familiar</a></b>

            <b><a href="../Vistas/productos.php?categoria=risa">De risa</a></b>

            <b><a href="../Vistas/productos.php?categoria=infantil">Infantil</a></b>

            <b><a href="../Vistas/productos.php?categoria=memoria">Memoria y atención</a></b>

            <b><a href="../Vistas/productos.php?categoria=fiesta">Fiesta</a></b>
        </ol>
    </div>


    <div class="d-none" id="opciones-emergente">
        <span class="material-symbols-rounded" id="closeOptions">close</span>
        <ul class="opciones-cat">
            <li>Categoriás</li>
            <select id="categorias">
                <option> De risa</option>
                <option>Familiar</option>
                <option>Memoria y atención</option>
                <option>Infantil</option>
                <option>Fiesta</option>
            </select>
            <li>
                <p><?php if(isset($_SESSION["email"])){echo $_SESSION["nombre"];} else{echo "Validar";} ?></p>
                <a href="<?php if(isset($_SESSION["email"])){ echo "../Controladores/CerrarSesion.php";} else{echo "../Controladores/Validar.php";} ?>">
                    <button> <?php if(isset($_SESSION["email"])){echo "Cerrar Sesión";} else{echo "Iniciar sesión";} ?> </button>
                </a>
            </li>

            <hr>
        </ul>


    </div>



</header>
<!--Script necesario para el buscador-->
<script src="../Js/styles/search.js"></script>