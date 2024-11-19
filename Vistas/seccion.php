<!--Vista seccion de una categoría-->
<section class="seccion-contenedor row">

    <div class="seccion-productos col-xl-8 offset-xl-2 col-12 ">

        <p class="seccion-titulo row"><?php echo $categoria; ?></p>

        <div class="seccion-productos-imagenes row">

            <?php
            $productosCat = json_decode(file_get_contents("http://localhost/Ludico/Api/ServicioProductos/controlador/producto.php?categoria=".$categoria));

            for($i=0;$i<6;$i++){

                if(isset($productosCat[$i])){
                    $producto = $productosCat[$i];
                    echo "<div class='seccion-productos-imagen col-6 col-md-4  col-xl-2'>
                    <a href='../Vistas/verProducto.php?idProducto=$producto->idProducto'></a>
                    <img class='img-fluid' src='../Imágenes/juegos/$producto->foto'>
                    <p>$producto->nombre</p>
                    <p>$producto->precio €</p>
                </div>";
                }
            }

            ?>

        </div>

        <p class="seccion-vermas row"><a href="../Vistas/productos.php?categoria=<?php echo $categoria?>">Ver más</a></p>

    </div>

</section>