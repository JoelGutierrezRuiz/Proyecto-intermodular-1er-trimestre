const searchInput = document.getElementById("buscador");
const searchButton = document.getElementById("lupa");
let serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php?categoria=";




const indexProducts = document.getElementsByClassName("seccion-productos-imagen");


displayCategory("Familiar")

async function displayCategory(category){

    const products= await fetch(url+category).then((res) => res.json())

    console.log(indexProducts[0].children)
    for(let i=0; i<5;i++){
        indexProducts[i].children[0].href="Detalle.php?nombre="+products[i].nombre;
        indexProducts[i].children[0].children[0].src="../Imágenes/juegos/"+products[i].foto;
        indexProducts[i].children[1].innerHTML=products[i].nombre;
        indexProducts[i].children[2].innerHTML=products[i].precio+"€";
    }   
    products.forEach(element => {
        //console.log(element.nombre)
    });

}
