const params = new URLSearchParams(window.location.search);
let serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php?idProducto="+params.get("idProducto");


const img = document.getElementById("producto-imagen");
const productName = document.getElementById("producto-nombre");
const category = document.getElementById("producto-categoria");
const description = document.getElementById("producto-descripcion");
const price = document.getElementById("producto-precio");

fetch(url)
.then((res)=>res.json())
.then((res)=>{
    img.src = "../Imágenes/juegos/"+res.foto;
    productName.innerHTML=res.nombre;
    category.innerHTML=res.categoria;
    description.innerHTML=res.descrip;
    price.innerHTML=res.precio+"€";
})

