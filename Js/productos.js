const params = new URLSearchParams(window.location.search);

const serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php";


const resultsContainer = document.getElementById("resultado-productos-row");
const titleResult = document.getElementById("resultado-busqueda");

if (params.get("categoria")) {
    search("categoria", params.get("categoria"));
    titleResult.innerHTML = params.get("categoria");

}
else if(params.get("nombre")) {
    search("nombre", params.get("nombre"));
    titleResult.innerHTML = "Resultados para " +'"' +params.get("nombre") +'"';
}
else{
    titleResult.innerHTML = "Sin resultados";
}


function createHtmlProduct(product) {

    const container = document.createElement("div");
    container.classList.add("producto", "col-6", "col-sm-4", "col-xl-3");

    const redir = document.createElement("a");
    redir.href = "../Controladores/Detalle.php?idProducto=" + product.idProducto;

    const img = document.createElement("img");
    img.src = "../Imágenes/juegos/" + product.foto;

    const name = document.createElement("p");
    name.innerHTML = product.nombre;

    const price = document.createElement("p");
    price.innerHTML = product.precio + "€";

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
}

function search(path, search) {
    let get = "?" + path + "=" + search;
    fetch(url + get).then((mes) => mes.json())
        .then((mes) => {
            if(mes.length==0){
                titleResult.innerHTML+="<br>Sin resultados";
            }
            else{
                titleResult.innerHTML+="  ("+mes.length+")";
            }

            printAllProducts(mes);
        })
        .catch((err) => console.log(err))
}