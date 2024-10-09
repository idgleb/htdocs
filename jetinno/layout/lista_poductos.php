<!-- lista_poductos.php -->

<?php

$productosPorPagina = 2;

try {
    // Conexión a la base de datos
    $conn = conectarDB();
    // Obtener el número total de productos
    $totalProductosResult = $conn->query("SELECT COUNT(*) AS total FROM productos");
    $totalProductos = $totalProductosResult->fetch_assoc()['total'];
    // Calcular el número total de páginas
    $totalPaginas = ceil($totalProductos / $productosPorPagina);
    $conn->close();
} catch (mysqli_sql_exception $e) {
    if ($redirectSiError) {
        header("Location: error.php?error=" . urlencode($e));
        die();
    }
    return null;
}

$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

mostrarBotonesNav($paginaActual, $totalPaginas);

function mostrarBotonesNav($paginaActual, $totalPaginas)
{
    // Mostrar los botones de navegación usando Bootstrap
    echo '<nav id="nav" aria-label="Page navigation example">';
    echo '<ul class="pagination justify-content-center">';
    // Enlace a la primera página
    if ($paginaActual > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=1#nav">&laquo; Primera</a></li>';
    }
    // Enlace a la página anterior
    if ($paginaActual > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($paginaActual - 1) . '#nav">&lsaquo; Anterior</a></li>';
    }
    // Mostrar un rango de enlaces de páginas (por ejemplo, máximo 5)
    $rango = 2; // Rango de páginas antes y después de la página actual
    $inicio = max(1, $paginaActual - $rango);
    $fin = min($totalPaginas, $paginaActual + $rango);
    if ($inicio > 1) {
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }
    for ($i = $inicio; $i <= $fin; $i++) {
        if ($i == $paginaActual) {
            echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>'; // Página actual
        } else {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . $i . '#nav">' . $i . '</a></li>';
        }
    }
    if ($fin < $totalPaginas) {
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }
    // Enlace a la página siguiente
    if ($paginaActual < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($paginaActual + 1) . '#nav">Siguiente &rsaquo;</a></li>';
    }
    // Enlace a la última página
    if ($paginaActual < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=' . $totalPaginas . '#nav">Última &raquo;</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
}


$offset = ($paginaActual - 1) * $productosPorPagina;
$redirectSiError = true;
$result = obtenerProdDeBase($redirectSiError, $productosPorPagina, $offset);
// Verificar si hay prod
if ($result->num_rows > 0) :
    $iter = 0;
    while ($row = $result->fetch_assoc()):
        // Convertir las características de la cadena a un array
        $caracteristicas = explode(',', $row['caracteristicas']);
        $iter++;
        $imgSinExt = obtenerNombreDeArchivoSinExt($row['img']);

        /////// lista de productos /////////
        if ($iter % 2 != 0): ?>
            <div class="col_row">
            <?php endif; ?>

            <div class="caja_producto">
                <div class="caja_prod_baton">
                    <figure><img class="imagen_prod" id="img_<?php echo $imgSinExt; ?>" src="img/<?php echo $row['img']; ?>" alt="<?php echo $row['img']; ?>"></figure>
                    <a class="baton" href="#venta_<?php echo $imgSinExt; ?>">Ver más</a>
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
        <div id="venta_<?php echo $imgSinExt; ?>">
            <div class="modal_prod">
                <div class="caja_img_producto_mod">
                    <img class="imagen_prod" id="img_<?php echo $imgSinExt; ?>_mod" src="img/<?php echo $row['img']; ?>" alt="<?php echo $row['img']; ?>">
                </div>
                <div class="text_prod_cont">
                    <h3><?php echo $row['nombre']; ?></h3>
                    <ul>
                        <?php foreach ($caracteristicas as $caracteristica): ?>
                            <li><?php echo trim($caracteristica); ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <a href="#img_<?php echo $imgSinExt; ?>">X</a>
            </div>
        </div>
        <!--////////////////////////-->

    <?php
    endwhile;
    mostrarBotonesNav($paginaActual, $totalPaginas);
else : ?>
    <h2>No se encontraron productos</h2>
<?php

endif;

?>