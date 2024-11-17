
let serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php?categoria=";




const indexProducts = document.getElementsByClassName("seccion-productos-imagen");


displayCategory("Familiar")

async function displayCategory(category){

    const products= await fetch(url+category).then((res) => res.json())

    console.log(products)
    for(let i=0; i<6;i++){
        indexProducts[i].children[0].href="Detalle.php?idProducto="+products[i].idProducto;
        indexProducts[i].children[1].src="../Imágenes/juegos/"+products[i].foto;
        indexProducts[i].children[2].innerHTML=products[i].nombre;
        indexProducts[i].children[3].innerHTML=products[i].precio+"€";
    }   


}
