<!--Asignamiento asegurado de email en el carrito
el idUnico se genera con el primer producto añadido al carrito
si el usuario ha iniciado sesión antes de añadir nada y hacemos la comprobación
en principal es posible que no se haga la modificación
-->

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
    <link rel="stylesheet" href="../Css/colores.css">
    <link rel="stylesheet" href="../Css/header.css">
    <link rel="stylesheet" href="../Css/footer.css">
    <link rel="stylesheet" href="../Css/verCarrito.css">

    <!--Fonts y Icons-->
    <link href="../Css/global.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">


        <?php include "header.php" ?>


        <div id="contenedorProductos" class="carrito-row row">

            <p class="carrito-tit col-6 offset-3">Carrito</p>


            <div id="con-productos" class="justify-content-between col-6 offset-3">
                <p>Producto</p>
                <p>Total</p>
            </div>

            <div id="sin-productos" class="justify-content-between col-6 offset-3">
                <p>Carrito vacío</p>
                <button><a href="../Vistas/productos.php?categoria=todos">Seguir comprando</a></button>
            </div>

            <!--

            <div class="carrito-producto col-6 offset-3">

                <div class="carrito-producto-crud">
                    <img class="carrito-producto-img" src="../Imágenes/juegos/monopoly.png">
                    <p class="carrito-producto-nombre">Monopoly</p>
                    <p class="carrito-producto-precio">19€</p>
                    <a href="#">Eliminar producto</a>

                    <div class="carrito-cantidades">
                        <button class="carrito-producto-quitar">-</button>
                        <p class="carrito-producto-cantidad">1</p>
                        <button class="carrito-producto-añadir">+</button>

                    </div>
                </div>

                <p class="carrito-producto-total">16€</p>

            </div>
            
            -->
        </div>

        <hr>
        <div id="subtotal" class="justify-content-between col-6 offset-3">
            <p>Subtotal</p>
            <p id="totalCarrito">Total</p>
            <button><a href="../Vistas/productos.php?categoria=todos">Seguir comprando</a></button>
            <button id="actualizar">Actualizar</button>
            <form action="" method="POST">
                <button name="confirmar"> Confirmar pedido </button>
            </form>
        </div>

        <?php include "footer.php" ?>
    </div>

    <script type="text/javascript">

        // Pasar variables PHP a JS dentro de un script en línea
        let serverIp = "localhost";
        let totalPrice = 0;
        let productsList;
        const refreshButton = document.getElementById("actualizar");
        let idUnico = <?php
        if (isset($_SESSION["idUnico"])) {
            echo json_encode($_SESSION["idUnico"]);
        } else {
            echo json_encode("");
        }
        ?>;

        let email = <?php
        if (isset($_SESSION["email"])) {
            echo json_encode($_SESSION["email"]);
        } else {
            echo json_encode("");
        }
        ?>;


        let producto = <?php
        if (isset($_SESSION["producto"])) {
            echo json_encode($_SESSION["producto"]);

        } else {
            echo json_encode("");
        }
        ?>;
        init();

        async function init() {
            //Tenemos que esperar 
            await createCart();
            await setEmailInCart();
            if (producto) {
                await addProduct(idUnico, producto.id, producto.cantidad);
            }

            await printProductos();
            refreshButton.addEventListener("click", refreshPage);
        }
        async function createCart() {
            let url = "http://localhost/Ludico/Api/ServicioCarrito/controlador/carrito.php";
            let body = {
                "idCarrito": idUnico
            }

            let header = {
                "method": "POST",
                "headers": { "Content-Type": "aplication/json" },
                "body": JSON.stringify(body)
            };
            let response = await fetch(url, header);
            let result = await response.json();

            return result;
        }
        async function setEmailInCart() {
            if (idUnico && email) {
                let url = "http://localhost/Ludico/Api/ServicioCarrito/controlador/carrito.php";
                let body = {
                    "idCarrito": idUnico,
                    "email": email
                }
                let header = {
                    "method": "PUT",
                    "headers": { "Content-Type": "aplication/json" },
                    "body": JSON.stringify(body)
                };
                let response =await fetch(url, header).then((res) => res.json());
                console.log("Se ha asignado un email al carrito: "+response);
            };
        }
        async function addProduct(idCarrito, idProd, cantidad) {
            let url = "http://localhost/Ludico/Api/ServicioCarrito/controlador/productosCarrito.php";
            let body = {
                "idCarrito": idCarrito,
                "idProducto": idProd,
                "cantidad": cantidad
            }

            let header = {
                "method": "POST",
                "headers": { "Content-Type": "aplication/json" },
                "body": JSON.stringify(body)
            };
            let response = await fetch(url, header);
            let result = await response.json();
            <?php unset($_SESSION["producto"]) ?>
        }
        async function refreshPage() {
            let productsList = await productList();
            let cantidades = document.getElementsByClassName("cantidades");
            let putPromise = [];

            for (let i = 0; i < productsList.length; i++) {
                let putUrl = "http://localhost/Ludico/Api/ServicioCarrito/controlador/productosCarrito.php";

                let putProduct = {
                    "idCarrito": idUnico,
                    "idProducto": productsList[i].idProducto,
                    "cantidad": cantidades[i].value
                }

                let header = {
                    "method": "PUT",
                    "headers": { "Content-Type": "aplication/json" },
                    "body": JSON.stringify(putProduct)
                }

                putPromise.push(fetch(putUrl, header));
            }

            let fetchAll = await Promise.all(putPromise);
            clearCart();
            printProductos();
        }
        async function productList() {

            let url = "http://localhost/Ludico/Api/ServicioCarrito/controlador/productosCarrito.php";
            let body = {
                "idCarrito": idUnico
            }

            let header = {
                "method": "POST",
                "headers": { "Content-Type": "aplication/json" },
                "body": JSON.stringify(body)
            };
            let response = await fetch(url, header);
            let result = await response.json();
            cartPopUp.innerHTML = result.length
            if (cartPopUp.innerHTML > 0) {
                cartPopUp.style.display = "flex"
            }
            else {
                cartPopUp.style.display = "none"
            }
            return result;
        }
        function createProduct(producto) {


            // Crear el contenedor principal del producto
            const carritoProducto = document.createElement('div');
            carritoProducto.classList.add('carrito-producto', 'col-6', 'offset-3');

            // Crear el contenedor para las acciones del producto (CRUD)
            const productoCrud = document.createElement('div');
            productoCrud.classList.add('carrito-producto-crud');

            // Crear y agregar la imagen del producto
            const imagenProducto = document.createElement('img');
            imagenProducto.classList.add('carrito-producto-img');
            imagenProducto.src = "../Imágenes/juegos/" + producto.foto;
            productoCrud.appendChild(imagenProducto);

            // Crear y agregar el nombre del producto
            const nombreProducto = document.createElement('p');
            nombreProducto.classList.add('carrito-producto-nombre');
            nombreProducto.textContent = producto.nombre;
            productoCrud.appendChild(nombreProducto);

            // Crear y agregar el precio del producto
            const precioProducto = document.createElement('p');
            precioProducto.classList.add('carrito-producto-precio');
            precioProducto.textContent = producto.precio + "€";

            productoCrud.appendChild(precioProducto);

            const quantity = document.createElement("input");
            quantity.type = "number";
            quantity.classList.add("cantidades");
            quantity.value = producto.cantidad;
            productoCrud.appendChild(quantity);

            quantity.addEventListener("change", (e) => {
                if (quantity.value < 1) {
                    quantity.value = 1;
                }
                if (quantity.value > 1000) {
                    quantity.value = 999;
                }
                totalProducto.innerHTML = Math.round(producto.precio * quantity.value) + "€";
            })

            // Crear y agregar el enlace para eliminar el producto
            const eliminarProducto = document.createElement('a');
            eliminarProducto.classList.add('eliminar-producto');
            eliminarProducto.textContent = "Eliminar producto";


            eliminarProducto.addEventListener('click', () => {

                //Removing the father
                carritoProducto.remove();

                //Delete fetch prep
                const url = "http://localhost/Ludico/Api/ServicioCarrito/controlador/productosCarrito.php";
                const body = {
                    idCarrito: idUnico,
                    idProducto: producto.idProducto
                };
                const header = {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(body)  // Convertimos el objeto a JSON
                }
                // Fetching

                const response = fetch(url, header)
                    .then((res) => res.json())
                    .then((res) => {
                        if (res) {
                            console.log("producto eliminado correctamente")
                            cartPopUp.innerHTML = parseInt(cartPopUp.innerHTML) - 1;
                            if (cartPopUp.innerHTML > 0) {
                                cartPopUp.style.display = "flex";
                            }
                            else {
                                cartPopUp.style.display = "none";
                                printProductos();
                            }
                        }
                    })
                    .catch((err) => {
                        console.log("No se ha podido eliminar el producto")
                    });
            })

            productoCrud.appendChild(eliminarProducto);




            // Crear y agregar el total del producto
            const totalProducto = document.createElement('p');
            totalProducto.classList.add('carrito-producto-total');
            totalProducto.textContent = Math.round(producto.total) + "€";


            // Agregar el contenedor de acciones (CRUD) y el total al contenedor principal
            carritoProducto.appendChild(productoCrud);
            carritoProducto.appendChild(totalProducto);

            // Devolver el elemento creado
            return carritoProducto;
        }
        
        async function printProductos() {
            
            clearCart();
            productos = await productList();
            let cartPrice = document.getElementById("totalCarrito");
            const contenedor = document.getElementById("contenedorProductos");
            const subtotal = document.getElementById("subtotal")
            const noProducts = document.getElementById("sin-productos");
            const withProducts = document.getElementById("con-productos");
            let promesas = [];


            if (productos.length == 0) {
                withProducts.style.display = "none";
                noProducts.style.display = "flex";
                subtotal.style.display = "none";
                return;
            }

            for (let i = 0; i < productos.length; i++) {
                let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php?idProducto=" + productos[i].idProducto;
                promesas.push(fetch(url));
            }

            let resultado = await Promise.all(promesas);
            let resultadoJson = [];
            for (let res of resultado) {
                resultadoJson.push(await res.json());
            }

            for (let i = 0; i < resultadoJson.length; i++) {
                let productoFinal = structuredClone(resultadoJson[i]);
                productoFinal.total = productos[i].cantidad * resultadoJson[i].precio;
                productoFinal.cantidad = productos[i].cantidad;
                totalPrice += productoFinal.total;
                contenedor.appendChild(createProduct(productoFinal));
            }

            cartPrice.innerHTML = Math.round(totalPrice) + "€";

        }
        function clearCart() {
            let cartPrice = document.getElementById("totalCarrito");
            totalPrice=0;
            cartPrice.innerHTML = "0";
            const htmlProducts = document.getElementsByClassName("carrito-producto");
            for (let i = 0; i < htmlProducts.length; i++) {
                htmlProducts[i].remove();
            }
        }

    </script>







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
    <script src="../Js/verCarrito.js"></script>
</body>

</html>