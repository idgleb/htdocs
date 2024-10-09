<?php
include_once "funciones.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $text = $_POST['text'] ?? '';
    $imgSinExt = $_POST['imgSinExt'] ?? '';
    $extension = $_POST['extension'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    $text = sanitario($text);
    $imgSinExt = sanitario($imgSinExt);
    $extension = sanitario($extension);
    $tipo = sanitario($tipo);
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
        error_log($e->getMessage(), 3, "error_log.txt");
        echo "Error en la base de datos. Inténtelo de nuevo más tarde.";
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
