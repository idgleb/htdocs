<?php
include_once "funciones.php";
?>

<!DOCTYPE html>

<?php $title = "AGREGAR PRODUCTOS"; ?>
<?php include 'layout/metedatos_css.php'; ?>

<?php
// procesar_producto

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // evitamos datos enviados por GET
    $nombreProducto = sanitario($_POST['nombreProducto']);
    $caracteristicasProducto = sanitario($_POST['caracteristicasProducto']);

    // Procesar la imagen
    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']['error'] === UPLOAD_ERR_OK) {
        $nombreImagen = $_FILES['imagenProducto']['name'];
        $rutaImagen = 'img/' . $nombreImagen; 

        // Mover la imagen subida al directorio deseado
        if (move_uploaded_file($_FILES['imagenProducto']['tmp_name'], $rutaImagen)) {
            echo "Imagen subido con éxito!<br>";
            // Aquí puedes insertar los datos en la base de datos

            $host = 'localhost';
            $user = 'root';
            $password = '';
            $dbname = 'jetinno_base_de_datos';
            //intentemos a conectar
            try {
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $conn = @new mysqli($host, $user, $password, $dbname);
                // Consulta preparada para evitar inyección SQL
                $stmt = $conn->prepare("INSERT INTO productos (nombre, img, caracteristicas) VALUES (?, ?, ?)"); //preparar una consulta SQL que se ejecutará mas tarde
                $stmt->bind_param("sss", $nombreProducto, $nombreImagen, $caracteristicasProducto);  // enlaza los tres valores a los tres placeholders ? de forma segura
                // Ejecutar la consulta de forma segura
                $stmt->execute();
                $stmt->close();
                $conn->close();
            } catch (mysqli_sql_exception $e) {
                if ($redirectSiError) {
                    header("Location: error.php?error=" . urlencode($e));
                    die();
                }
            }
        } else {
            echo "Error al subir la imagen.<br>";
        }
    } else {
        echo "Error al procesar la imagen.<br>";
    }
} else {
    echo "Método de envío no permitido.<br>";
}

?>

<body>

    <?php include 'layout/admin_header.php'; ?>

    <main>

        <div class="width90centr">
            <?php //nombre, img, caracteristisas 
            ?>

            <div class="container mt-5">
                <h2 class="mb-4">Agregar Producto</h2>
                <form action="admin_agragar.php" method="POST" enctype="multipart/form-data">
                    <!-- Nombre del Producto -->
                    <div class="mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Ingrese el nombre del producto" required>
                    </div>

                    <!-- Imagen del Producto -->
                    <div class="mb-3">
                        <label for="imagenProducto" class="form-label">Imagen del Producto</label>
                        <input type="file" class="form-control" id="imagenProducto" name="imagenProducto" accept="image/*" required>
                    </div>

                    <!-- Características del Producto -->
                    <div class="mb-3">
                        <label for="caracteristicasProducto" class="form-label">Características del Producto</label>
                        <textarea class="form-control" id="caracteristicasProducto" name="caracteristicasProducto" rows="4" placeholder="Ingrese las características del producto" required></textarea>
                    </div>

                    <!-- Botón de Enviar -->
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


        </div>

    </main>

    <?php include 'layout/admin_footer.php'; ?>


</body>

</html>