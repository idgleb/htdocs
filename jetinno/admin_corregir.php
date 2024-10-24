<?php
include_once "funciones.php";
$mensaje = "";
?>

<!DOCTYPE html>

<?php $title = "CAMBIAR"; ?>
<?php include 'layout/metedatos_css.php'; ?>

<body>

    <div id="ventajamodal">
        <div class="modal_cont">
            <a href="#">X</a>
            <h2><?php echo $mensaje ?></h2>
        </div>
    </div>

    <?php include 'layout/admin_header.php'; ?>

    <main>

        <div class="width90centr">
        <h2 class="mb-1">Corregir Productos</h2>


            <?php

            $productosPorPagina = 5;

            try {
                // Conexión a la base de datos
                $conn = conectarDB(true);
                // Obtener el número total de productos
                $totalProductosResult = $conn->query("SELECT COUNT(*) AS total FROM productos");
                $totalProductos = $totalProductosResult->fetch_assoc()['total'];
                // Calcular el número total de páginas
                $totalPaginas = ceil($totalProductos / $productosPorPagina);
                $conn->close();
            } catch (mysqli_sql_exception $e) {
                manejarError($e, "Paso algo malo", true);
            }

            $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $paginaActual = sanitario($paginaActual);

            mostrarBotonesNav($paginaActual, $totalPaginas, true);

            $offset = ($paginaActual - 1) * $productosPorPagina;

            $redirectSiError = true;
            $result = obtenerProdDeBase($redirectSiError, $productosPorPagina, $offset);

            // Verificar si hay prod
            if ($result->num_rows > 0) :
                $iter = 0;
                while ($row = $result->fetch_assoc()):
                    // Convertir las características de la cadena a un array
                    $caracteristicas = explode(',', $row['caracteristicas']);
                    $imgSinExt = obtenerNombreDeArchivoSinExt($row['img']);
                    $extension = obtenerExtDeArchivo($row['img']);
                    $nombreImagen = $imgSinExt . '.' . $extension;
                    $rutaImagen = 'img/' . $nombreImagen;

                    /////// lista de productos /////////
                    $iter++;
                    if ($iter % 2 != 0): ?>
                        <div class="col_row">
                        <?php endif; ?>

                        <div id="producto_<?php echo $imgSinExt; ?>">

                            <div class="caja_producto">
                                <div class="caja_prod_baton">

                                    <figure>
                                        <!-- Imagen del producto -->
                                        <img class="imagen_prod hover"
                                            id="img_<?php echo $imgSinExt; ?>"
                                            src="<?php echo $rutaImagen; ?>"
                                            alt="<?php echo $nombreImagen; ?>"
                                            onclick="seleccionarImagen('<?php echo $imgSinExt; ?>')"
                                            data-bs-toggle="popover"
                                            data-bs-trigger="hover"
                                            data-bs-content="Click para cambiarlo"
                                            data-bs-placement="top">
                                    </figure>
                                    <!-- Input oculto para seleccionar el archivo -->
                                    <input class="oculto" type="file" id="input_<?php echo $imgSinExt; ?>" onchange="subirImagen('<?php echo $imgSinExt; ?>','<?php echo $extension; ?>')" accept="image/*">

                                </div>
                                <div class="text_prod_cont">

                                    <label for="nombre_<?php echo $imgSinExt; ?>" class="form-label">Nombre del Producto</label>

                                    <textarea
                                        onchange="subirText('<?php echo $imgSinExt; ?>','<?php echo $extension; ?>','nombre')"
                                        class="form-control"
                                        id="nombre_<?php echo $imgSinExt; ?>"
                                        name="nombre_<?php echo $imgSinExt; ?>"
                                        rows="2"><?php echo $row['nombre']; ?></textarea>

                                    <label for="caracteristicas_<?php echo $imgSinExt; ?>" class="form-label">Características del Producto</label>

                                    <textarea
                                        onchange="subirText('<?php echo $imgSinExt; ?>','<?php echo $extension; ?>','caracteristicas')" ,class="form-control" id="caracteristicas_<?php echo $imgSinExt; ?>" name="caracteristicas_<?php echo $imgSinExt; ?>" rows="4"><?php echo $row['caracteristicas']; ?></textarea>

                                </div>
                            </div>

                        </div>


                        <?php if ($iter % 2 == 0 || $iter == $result->num_rows): ?>
                        </div>
                    <?php endif; ?>
                    <!--///////////////////////////////-->

                <?php
                endwhile;
                mostrarBotonesNav($paginaActual, $totalPaginas);
            else : ?>
                <h2>No se encontraron productos</h2>
            <?php

            endif;

            ?>

        </div>

    </main>

    <?php include 'layout/admin_footer.php'; ?>


</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    var popoverTriggerList;
    var popoverList;
    document.addEventListener('DOMContentLoaded', function() { obtenerPopers();});

    function obtenerPopers() {
        popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }

    function cerrarTodosPopers() {
        popoverTriggerList.map(function(popoverTriggerEl) {
            var popover = bootstrap.Popover.getInstance(popoverTriggerEl); // Obtener instancia del popover
            popover?.dispose(); // Cierra el popover si existe
        });
    }

    // Función para abrir el explorador de archivos al hacer clic en la imagen
    function seleccionarImagen(imgId_SinExt) {
        document.getElementById('input_' + imgId_SinExt).click(); // Activa el input file oculto
    }

    // Función para subir la imagen seleccionada mediante AJAX
    function subirImagen(imgSinExt, imgExt) {

        cerrarTodosPopers();

        var input = document.getElementById('input_' + imgSinExt);
        var file = input.files[0];
        if (file) {

            var formData = new FormData();
            formData.append('imagen', file);
            let img = imgExt ? `${imgSinExt}.${imgExt}` : imgSinExt;
            formData.append('img', img);

            fetch('subir_imagen.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al subir la imagen.');
                    }
                    return response.text();
                })
                .then(texto => {
                    let conteiner = document.getElementById('producto_' + imgSinExt);
                    conteiner.innerHTML = texto;
                    let inicio = texto.indexOf('[') + 1;
                    let fin = texto.indexOf(']');
                    let id = texto.substring(inicio, fin);
                    conteiner.id = 'producto_' + id;

                    obtenerPopers();

                })
                .catch(error => {
                    alert(error.message);
                });
        }
    }



    function subirText(imgSinExt, imgExt, tipo) {

        var textarea = document.getElementById(tipo + '_' + imgSinExt);

        if (textarea) {

            var text = textarea.value;

            // Crear el cuerpo de la solicitud concatenando los valores
            let body = 'text=' + encodeURIComponent(text) +
                '&imgSinExt=' + encodeURIComponent(imgSinExt) +
                '&extension=' + encodeURIComponent(imgExt) +
                '&tipo=' + encodeURIComponent(tipo);

            fetch('subir_text.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: body
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud: ' + response.statusText);
                    }
                    return response.text();
                })
                .then(data => {
                    console.log('Respuesta del servidor:', data);

                })
                .catch(error => {
                    console.error('Hubo un problema con la solicitud:', error);
                });

        } else {
            alert("El elemento " + tipo + "_" + imgSinExt + " no existe");
        }
    }
</script>