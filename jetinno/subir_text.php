<?php
include_once "funciones.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $text = sanitario($_POST['text'] ?? '');
    $imgSinExt = sanitario($_POST['imgSinExt'] ?? '');
    $extension = sanitario($_POST['extension'] ?? '');
    $tipo = sanitario($_POST['tipo'] ?? '');
    $nombreImagen = $imgSinExt . '.' . $extension;

    try {
        // Conexión a la base de datos
        $conn = conectarDB();
        // Consulta preparada para evitar inyección SQL  
        $stmt = $conn->prepare("UPDATE productos SET $tipo = ? WHERE img = ?");
        $stmt->bind_param('ss', $text, $nombreImagen);
        $stmt->execute();

        // Verificar si alguna fila fue afectada
        if ($stmt->affected_rows > 0) {
            echo "<h2>Actualizado el producto con éxito.</h2>";
        } elseif ($stmt->affected_rows == 0) {
            echo "<h2>No se realizaron cambios.</h2>";
        } else {
            echo "<h2>Error: No se pudo actualizar el producto.</h2>";
        }

    } catch (mysqli_sql_exception $e) {
        manejarError($e, "Error en la base de datos", false);
        echo "Error en la base de datos.";
    } finally {
        // Cerramos $stmt y $conn en el bloque finally para asegurar que siempre se cierran
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($conn)) {
            $conn->close();
        }
    }
}
