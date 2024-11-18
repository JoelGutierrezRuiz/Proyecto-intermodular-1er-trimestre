<!--Vista envío-->
<div class="promocion-envio row d-none d-md-block">
    <p class="col-12">ENVÍO GRATUITO A PARTIR DE 45$ DE COMPRA</p>
</div>
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

        <span id="login" class="material-symbols-rounded d-xl-block d-none">
            <a href="../Controladores/Validar.php">chess_pawn</a>
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
            <b><a href="#">Familiar</a></b>

            <b><a href="">De risa</a></b>

            <b><a href="">Infantil</a></b>

            <b><a href="">Memoria y atención</a></b>

            <b><a href="">Fiesta</a></b>
        </ol>
    </div>


    <div class="d-none" id="opciones-emergente">
        <span class="material-symbols-rounded" id="closeOptions">close</span>
        <ul class="opciones-cat">
            <li>Categoriás</li>
            <select id="categorias">
                <option> De risa</option>
                <option>Familiar</option>
                <option>Infantiles</option>
                <option>Memoria y atención</option>
                <option>Infantiles</option>
                <option>Fiesta</option>
            </select>
            <li>
                <p>Validar</p>
                <a href="../Controladores/Validar.php">
                    <button>Mi cuenta</button>
                </a>
            </li>

            <hr>
        </ul>


    </div>



</header>