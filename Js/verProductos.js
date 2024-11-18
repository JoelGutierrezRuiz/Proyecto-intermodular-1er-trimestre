const params = new URLSearchParams(window.location.search);
let serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php?idProducto="+params.get("idProducto");


const img = document.getElementById("producto-imagen");
const productName = document.getElementById("producto-nombre");
const category = document.getElementById("producto-categoria");
const description = document.getElementById("producto-descripcion");
const price = document.getElementById("producto-precio");
const quantity = document.getElementById("producto-cantidad");

const idProduct = document.getElementById("idProducto");
const phpName = document.getElementById("nombre-producto");
const phpPrice = document.getElementById("precio-producto");
const phpImg = document.getElementById("foto-producto");
quantity.value=1;



quantity.addEventListener("change",(e)=>{
    if(e.target.value<1){
        e.target.value=1;
    }
    if(e.target.value>99){
        e.target.value=99;
    }
})

fetch(url)
.then((res)=>res.json())
.then((res)=>{
    img.src = "../Imágenes/juegos/"+res.foto;
    productName.innerHTML=res.nombre;
    category.innerHTML=res.categoria;
    description.innerHTML=res.descrip;
    price.innerHTML=res.precio+"€";

    idProduct.value = res.idProducto;
    phpPrice.value = res.precio;
    phpName.value = res.nombre;
    phpImg.value = res.foto;
})



function addToCart(event){
    event.preventDefault();
    let quant = quantity.value;
    if(quant>0 && quant<100){
        event.target.submit();
    }
    else{
        console.log("cantidad invalida");
    }
}