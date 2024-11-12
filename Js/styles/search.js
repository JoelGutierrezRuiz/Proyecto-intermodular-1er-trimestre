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