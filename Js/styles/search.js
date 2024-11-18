const searchButton = document.getElementById("lupa");
const searchInput = document.getElementById("buscador");

//Tiene que ser una busqueda con json!!!!!!!!!
searchButton.addEventListener("click", () => {
    window.location.href = "http://localhost/Ludico/Vistas/productos.php?nombre=" + searchInput.value;
})


const popUpSearchContainer = document.getElementById("buscador-emergente-contenedor")
const popUpSearchButton = document.getElementById("lupa-emergente");


const popSearchInput = document.getElementById("buscador-input-emergente");
const openSearchPopUp= document.getElementById("abrir-buscador-emergente");
popUpSearchButton.addEventListener("click", () => {
    window.location.href = "http://localhost/Ludico/Vistas/productos.php?nombre=" + popSearchInput.value;
})
openSearchPopUp.addEventListener("click",()=>{
    if(popUpSearchContainer.classList.contains("d-block")) {
        popUpSearchContainer.classList.add("d-none");
        popUpSearchContainer.classList.remove("d-block");
        popUpSearchContainer.classList.remove("d-md-none");
    }
    else{
        popUpSearchContainer.classList.add("d-block");
        popUpSearchContainer.classList.add("d-md-none");
        popUpSearchContainer.classList.remove("d-none");
        
    }
})

const popUpCat = document.getElementById("boton-categorias");
const catList = document.getElementById("lista-categorias");

popUpCat.addEventListener("click",()=>{

    if(catList.classList.contains("d-xl-block")) {
        catList.classList.remove("d-xl-block");
    }
    else{
        catList.classList.add("d-xl-block");
    }

});

const options = document.getElementById("categorias");


optionClicables()
function optionClicables() {

    for (let i = 0; i < options.children.length; i++) {

        options.children[i].addEventListener("click", (e) => {
            const selectValue = e.target.value
            window.location.href = "../Vistas/productos.html?categoria=" + selectValue;
        })

    }


}



document.getElementById('menu').addEventListener('click', () => {
    const options = document.getElementById('opciones-emergente');
    if (options.classList.contains('d-none')) {
        options.classList.remove('d-none');
        options.classList.add('d-xl-none');
    } else {
        options.classList.add('d-none');
        options.classList.remove('d-xl-none');
    }
});
document.getElementById('closeOptions').addEventListener("click",()=>{
        const options = document.getElementById('opciones-emergente');
        if (options.classList.contains('d-none')) {
            options.classList.remove('d-none');
        } else {
            options.classList.add('d-none');
        }
    }
);

