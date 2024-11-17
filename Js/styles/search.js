//Esto es mas bien funcionalidad del headear



const searchButton = document.getElementById("lupa");
const searchInput = document.getElementById("buscador");


searchButton.addEventListener("click",()=>{
    window.location.href="http://localhost/Ludico/Vistas/productos.html?nombre="+searchInput.value;
})


const options = document.getElementById("categorias");

optionClicables()

function optionClicables(){

    for(let i=0; i<options.children.length;i++){

        options.children[i].addEventListener("click",(e)=>{
            const selectValue = e.target.value
            window.location.href="../Vistas/productos.html?categoria="+selectValue;
        })

    }


}
document.getElementById('lupa').addEventListener('click', function() {
    const searchRow = document.getElementById('search-row');
    if (searchRow.classList.contains('d-none')) {
        searchRow.classList.remove('d-none');
    } else {
        searchRow.classList.add('d-none');
    }
});
document.getElementById('menu').addEventListener('click', function() {
    const options = document.getElementById('opciones-emergente');
    if (options.classList.contains('d-none')) {
        options.classList.remove('d-none');
    } else {
        options.classList.add('d-none');
    }
});
document.getElementById('closeOptions').addEventListener("click",
    function(){
        const options = document.getElementById('opciones-emergente');
        if (options.classList.contains('d-none')) {
            options.classList.remove('d-none');
        } else {
            options.classList.add('d-none');
        }
    }
);


searchButton.addEventListener("click", () => {

    let search = "?nombre="+ searchInput.value;
    fetch(url + search).then((mes) => mes.json())
        .then((mes) => printAllProducts(mes))
        .catch((err) => console.log(err))

});