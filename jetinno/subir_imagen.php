<?php
include_once "funciones.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se ha enviado una imagen y un ID de producto
    if (isset($_FILES['imagen']) && isset($_POST['img'])) {

        $imgId = $_POST['img'];  // Obtener el nombre del archivo de producto que vamos a renovar
        $imgId = sanitario($imgId);

        // Verificar si hubo un error al subir la imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {

            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $imgSinExt = time() . '_' . bin2hex(random_bytes(8));
            $nombreImagen = $imgSinExt . '.' . $extension;
            $rutaImagen = 'img/' . $nombreImagen;

            // Mover la imagen a la carpeta 'img/'
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {

                try {
                    // Conexión a la base de datos
                    $conn = conectarDB();
                    // Consulta preparada para evitar inyección SQL  
                    $stmt = $conn->prepare("UPDATE productos SET img = ? WHERE img = ?");
                    $stmt->bind_param('ss', $nombreImagen, $imgId);
                    $stmt->execute();

                    // Verificar si alguna fila fue afectada
                    if ($stmt->affected_rows > 0) {

                        $producto = obtenerUnProd($nombreImagen);
                        if ($producto) {
                            $newCaracteristicas = explode(',', $producto['caracteristicas']);
                            $newImgSinExt = obtenerNombreDeArchivoSinExt($producto['img']);
                            $newExtension = obtenerExtDeArchivo($producto['img']);
                            $newNombreImagen = $newImgSinExt . '.' . $newExtension;
                            $newRutaImagen = 'img/' . $newNombreImagen;
?>

                            <!--[<?php echo $newImgSinExt; ?>] -->
                            <div class="caja_producto">
                                <div class="caja_prod_baton">
                                    <figure>
                                        <img class="imagen_prod" id="img_<?php echo $newImgSinExt; ?>" src="<?php echo $newRutaImagen; ?>" alt="<?php echo $newNombreImagen; ?>" onclick="seleccionarImagen('<?php echo $newImgSinExt; ?>')">
                                    </figure>
                                    <input class="oculto" type="file" id="input_<?php echo $newImgSinExt; ?>" onchange="subirImagen('<?php echo $newImgSinExt; ?>','<?php echo $newExtension; ?>')">
                                </div>

                                <div class="text_prod_cont">

                                    <label for="nombre_<?php echo $newImgSinExt; ?>" class="form-label">Nombre del Producto</label>
                                    <textarea class="form-control" id="nombre_<?php echo $newImgSinExt; ?>" name="nombre_<?php echo $newImgSinExt; ?>" rows="2"><?php echo $producto['nombre']; ?></textarea>

                                    <label for="caracter_<?php echo $newImgSinExt; ?>" class="form-label">Características del Producto</label>
                                    <textarea class="form-control" id="caracter_<?php echo $newImgSinExt; ?>" name="caracter_<?php echo $newImgSinExt; ?>" rows="4"><?php echo $producto['caracteristicas']; ?></textarea>

                                </div>


                            </div>

<?php
                        } else {
                            echo "No se encontró ningún producto con ese ID.";
                        }
                    } else {
                        echo "<h2>Error: No se pudo actualizar el producto.</h2>";
                    }

                    // Cerrar la sentencia y la conexión
                    $stmt->close();
                    $conn->close();
                } catch (mysqli_sql_exception $e) {
                    echo "Error en la base de datos: " . htmlspecialchars($e->getMessage());
                }
            } else {
                echo "Error al mover la imagen.";
            }
        } else {
            echo "Error al subir la imagen.";
        }
    }
}
?>