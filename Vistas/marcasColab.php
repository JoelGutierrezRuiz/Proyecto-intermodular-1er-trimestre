<!--Vista marcas-->
<div class="marcas-contenedor row">
    <p class="marcas-texto col-10 offset-1">Las Mejores Marcas de Juegos, ¡Todo en Un Solo Lugar!</p>
    <div class="marcas-imgs col-12 col-xl-8 offset-xl-2">
        <img alt="hasbro-logo" src="../Imágenes/marcas/hasbro.jpg" class="marca-logo" data-url="https://www.hasbro.com">
        <img alt="mattel-logo" src="../Imágenes/marcas/Mattel.png" class="marca-logo" data-url="https://www.mattel.com">
        <img alt="ravensburger-logo" src="../Imágenes/marcas/ravensburger.png" class="marca-logo"
            data-url="https://www.ravensburger.com">
        <img alt="asmodee-logo" src="../Imágenes/marcas/asmode.jpg" class="marca-logo"
            data-url="https://www.asmodee.com">
        <img alt="jumbo-logo" src="../Imágenes/marcas/jumbo.png" class="marca-logo" data-url="https://www.jumbo.eu">
    </div>


    <script>

        document.querySelectorAll('.marca-logo').forEach(function (image) {
            image.addEventListener('click', function () {
                window.open(image.getAttribute('data-url'), '_blank');
            });
        });


    </script>

</div>