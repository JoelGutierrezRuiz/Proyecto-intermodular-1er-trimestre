let serverIp = "localhost"
let url = "http://" + serverIp + "/Ludico/Api/ServicioProductos/controlador/producto.php";


const searchInput = document.getElementById("buscador");
const searchButton = document.getElementById("lupa");


searchButton.addEventListener("click",()=>{

    let search = "?nombre="+searchInput.value;

    


    fetch(url+search).then((mes)=>mes.json())
    .then((mes)=>console.log(mes))
    .catch((err)=>console.log(err))
})