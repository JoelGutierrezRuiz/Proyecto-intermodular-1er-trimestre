let serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php";


const searchInput = document.getElementById("buscador");
const searchButton = document.getElementById("lupa");
const resultsContainer = document.getElementById("resultado-productos-row");


function createHtmlProduct(product) {

    const container = document.createElement("div");
    container.classList.add("producto","col-6","col-sm-4","col-xl-3");

    const redir = document.createElement("a");
    redir.href = "../Controladores/detalle.php?nombre=" + product.nombre;

    const img = document.createElement("img");
    img.src = "../Imágenes/juegos/" + product.foto;

    const name = document.createElement("p");
    name.innerHTML = product.nombre;

    const price = document.createElement("p");
    price.innerHTML = product.precio

    container.appendChild(redir);
    container.appendChild(img);
    container.appendChild(name);
    container.appendChild(price);

    return container;

}


function printAllProducts(products) {

    console.log(products)

    for (let i = 0; i < products.length; i++) {
        resultsContainer.appendChild(createHtmlProduct(products[i]));
    }
    for (let i = 0; i < products.length; i++) {
        resultsContainer.appendChild(createHtmlProduct(products[i]));
    }
}


searchButton.addEventListener("click", () => {

    let search = "?categoria=Familiar" //+ searchInput.value;


    fetch(url + search).then((mes) => mes.json())
        .then((mes) => printAllProducts(mes))
        .catch((err) => console.log(err))

})