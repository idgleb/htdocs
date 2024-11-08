<?php
include_once "funciones.php";
$mensaje = "";
?>

<!DOCTYPE html>

<?php $title = "AGREGAR PRODUCTOS"; ?>
<?php include 'layout/metedatos_css.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // evitamos procesar datos enviados por GET
    $nombreProducto = sanitario($_POST['nombreProducto']??"");
    $caracteristicasProducto = sanitario($_POST['caracteristicasProducto']??"");
    // Procesar la imagen
    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']['error'] === UPLOAD_ERR_OK) {
        $extension = pathinfo($_FILES['imagenProducto']['name'], PATHINFO_EXTENSION);
        $nombreImagen = time() . '_' . bin2hex(random_bytes(8)) . '.' . $extension;
        $rutaImagen = 'img/' . $nombreImagen;
        // Mover la imagen subida al directorio 
        if (move_uploaded_file($_FILES['imagenProducto']['tmp_name'], $rutaImagen)) {
            //  insertar los datos en la base de datos
            try {
                $conn = conectarDB();
                $stmt = $conn->prepare("INSERT INTO productos (nombre, img, caracteristicas) VALUES (?, ?, ?)"); //preparar una consulta SQL que se ejecutará mas tarde
                $stmt->bind_param("sss", $nombreProducto, $nombreImagen, $caracteristicasProducto);  // enlaza los tres valores a los tres placeholders ? 
                // Ejecutar la consulta 
                $stmt->execute();
                $stmt->close();
                $conn->close();
                $mensaje = "Producto agregado con exito";
            } catch (mysqli_sql_exception $e) {
                manejarError($e, "Paso algo malo", true);
            }
        } else {
            $mensaje = "Error guardar la imagen";
        }
    } else {
        $mensaje = "Error al procesar la imagen";
    }
}

?>

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

            <div class="container mb-5">
                <h2 class="mb-1">Agregar Producto</h2>
                <form class="row" action="admin_agregar.php#ventajamodal" method="POST" enctype="multipart/form-data">
                    <div class="mb-0">
                        <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Ingrese el nombre del producto" required>
                        <label for="imagenProducto" class="form-label">Imagen del Producto</label>
                        <input type="file" class="form-control" id="imagenProducto" name="imagenProducto" accept="image/*" required>
                        <label for="caracteristicasProducto" class="form-label">Características del Producto</label>
                        <textarea class="form-control" id="caracteristicasProducto" name="caracteristicasProducto" rows="2" placeholder="Ingrese las características del producto" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            </div>

            <?php include 'layout/lista_poductos.php'; ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                // Función para abrir el explorador de archivos al hacer clic en la imagen
                function seleccionarImagen(imgId_SinExt) {
                    document.getElementById('input_' + imgId_SinExt).click(); // Activa el input file oculto
                }

                // Función para subir la imagen seleccionada mediante AJAX
                function subirImagen(imgSinExt, imgExt) {
                    var input = document.getElementById('input_' + imgSinExt); // Input de archivo
                    var file = input.files[0]; // Obtener el archivo seleccionado
                    if (file) {
                        var formData = new FormData();
                        formData.append('imagen', file); // Añadir el archivo al formData
                        formData.append('img', imgSinExt + "." + imgExt); // Añadir el nombre de archivo del producto
                        // Realizar la petición AJAX para enviar la imagen al servidor
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'subir_imagen.php', true); // Aquí se procesa la imagen en el servidor
                        // Respuesta del servidor
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Actualizar la imagen en la página sin recargar

                                document.getElementById('producto_' + imgSinExt).innerHTML = xhr.responseText;

                            } else {
                                alert('Error al subir la imagen.');
                            }
                        };
                        xhr.send(formData); // Enviar los datos al servidor
                    }
                }
            </script>


        </div>

    </main>

    <?php include 'layout/admin_footer.php'; ?>


</body>

</html>