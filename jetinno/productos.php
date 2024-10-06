<?php

include_once "funciones.php";
$result = obtenerProdDeBase();

?>

<!DOCTYPE html>

<?php
$title = "PRODUCTOS";
include 'layout/metedatos_css.php';
?>

<body>
    <?php include 'layout/header.php'; ?>

    <main>
        <div class="width90centr">
            <h2>PRODUCTOS DESTACADOS</h2>
        </div>

        <?php
        // Verificar si hay prod
        if ($result->num_rows > 0) :
            $iter = 0;
            while ($row = $result->fetch_assoc()):
                // Convertir las características de la cadena a un array
                $caracteristicas = explode(',', $row['caracteristicas']);
                $iter++;

                /////// lista de productos /////////
                if ($iter % 2 != 0): ?>
                    <div class="col_row">
                    <?php endif; ?>

                    <div class="caja_producto">
                        <div class="caja_prod_baton">
                            <figure><img id="img_<?php echo $row['img']; ?>" src="img/<?php echo $row['img']; ?>.png" alt="<?php echo $row['img']; ?>"></figure>
                            <a class="baton" href="#venta_<?php echo $row['img']; ?>">Ver más</a>
                        </div>
                        <div class="text_prod_cont">
                            <h3><?php echo $row['nombre']; ?></h3>
                            <ul>
                                <?php foreach ($caracteristicas as $caracteristica): ?>
                                    <li><?php echo trim($caracteristica); ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <?php if ($iter % 2 == 0 || $iter == $result->num_rows): ?>
                    </div>
                <?php endif; ?>
                <!--///////////////////////////////-->

                <!--lista de ventanas modales para productos////////-->
                <div id="venta_<?php echo $row['img']; ?>">
                    <div class="modal_prod">
                        <div class="caja_img_producto_mod">
                            <img id="img_<?php echo $row['img']; ?>_mod" src="img/<?php echo $row['img']; ?>.png" alt="<?php echo $row['img']; ?>">
                        </div>
                        <div class="text_prod_cont">
                            <h3><?php echo $row['nombre']; ?></h3>
                            <ul>
                                <?php foreach ($caracteristicas as $caracteristica): ?>
                                    <li><?php echo trim($caracteristica); ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <a href="#img_<?php echo $row['img']; ?>">X</a>
                    </div>
                </div>
                <!--////////////////////////-->

            <?php
            endwhile;
        else : ?>
            <h2>No se encontraron productos</h2>
        <?php

        endif;
        
        ?>


        <section>
            <iframe width="760" height="415" src="https://www.youtube.com/embed/icu3Lys3NKU?si=RXNuVVFrBlUWnWpF"
                title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </section>

    </main>


    <?php include 'layout/footer.php'; ?>


</body>

</html>