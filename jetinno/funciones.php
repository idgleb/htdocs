<?php

function conectarDB()
{

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'jetinno_base_de_datos';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return new mysqli($host, $user, $password, $dbname);
}


function sanitario($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function obtenerProdDeBase2($redirectSiError)
{
    //intentemos a conectar
    try {
        // Conexión a la base de datos
        $conn = conectarDB();
        // Consulta para obtener los productos
        $sql = "SELECT id, nombre, img, caracteristicas FROM productos";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    } catch (mysqli_sql_exception $e) {
        if ($redirectSiError) {
            header("Location: error.php?error=" . urlencode($e));
            die();
        }
        return null;
    }
}

function obtenerProdDeBase($redirectSiError, $limit = null, $offset = null)
{
    // Intentemos conectar
    try {
        // Conexión a la base de datos
        $conn = conectarDB();
        // Consulta para obtener los productos, agregando paginación si es necesario
        $sql = "SELECT id, nombre, img, caracteristicas FROM productos";
        if ($limit !== null && $offset !== null) {
            $sql .= " LIMIT ? OFFSET ?";
        }
        // Preparar la consulta
        $stmt = $conn->prepare($sql);
        if ($limit !== null && $offset !== null) {
            $stmt->bind_param('ii', $limit, $offset);
        }
        $stmt->execute();
        // Obtener el resultado
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result;
    } catch (mysqli_sql_exception $e) {
        // Si hay un error y se requiere redirección
        if ($redirectSiError) {
            if (!headers_sent()) {
                header("Location: error.php?error=" . urlencode($e->getMessage()));
                exit();
            } else {
                echo "<script>window.location.href='error.php?error=" . urlencode($e->getMessage()) . "';</script>";
                exit();
            }
        }
        // Cerrar conexión en caso de error
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($conn)) {
            $conn->close();
        }
        return null;
    }
}


function obtenerUnProd($nombreImagen)
{

    // Intentemos conectar y manejar posibles excepciones
    try {
        // Conexión a la base de datos
        $conn = conectarDB();
        $stmt = $conn->prepare("SELECT * FROM productos WHERE img = ?");
        $stmt->bind_param('s', $nombreImagen);
        $stmt->execute();
        $result = $stmt->get_result(); // Obtener el resultado de la consulta ejecutada
        if ($result->num_rows > 0) {
            $producto = $result->fetch_assoc();
        } else {
            $producto = null;
        }
        $stmt->close();
        $conn->close();
        return $producto;
    } catch (mysqli_sql_exception $e) {
        echo "Error en la base de datos: " . $e->getMessage();
        return null;
    }
}

function obtenerNombreDeArchivoSinExt($nombreArchivo)
{
    $posicionDePunto = strpos($nombreArchivo, '.');
    // Si el símbolo '.' se encuentra en la cadena
    if ($posicionDePunto !== false) {
        // Obtener la subcadena antes del '.'
        $imgSinExt = substr($nombreArchivo, 0, $posicionDePunto);
    } else {
        $imgSinExt = $nombreArchivo;
    }

    return $imgSinExt;
}
function obtenerExtDeArchivo($nombreArchivo)
{
    $posicionDePunto = strpos($nombreArchivo, '.');
    // Si el símbolo '.' se encuentra en la cadena
    if ($posicionDePunto !== false) {
        // Obtener la subcadena despues del '.'
        $imgExt = substr($nombreArchivo, $posicionDePunto + 1);
    } else {
        $imgExt = "";
    }

    return $imgExt;
}

function imprimirListaDeIdProdParaVentajasModalesCSS($beforStr, $afterStr)
{
    $redirect = false;
    $result = obtenerProdDeBase($redirect);

    if ($result != null) {
        if ($result->num_rows > 0) :
            $iter = 0;
            while ($row = $result->fetch_assoc()):
                $iter++;

                $imgSinExt = obtenerNombreDeArchivoSinExt($row['img']);

                echo $beforStr . $imgSinExt . $afterStr;

                if ($iter != $result->num_rows):
                    echo ",";
                endif;

            endwhile;
        endif;
    }
}

function listaModal()
{
    imprimirListaDeIdProdParaVentajasModalesCSS("#venta_", "");
}
function listaModalTarget()
{
    imprimirListaDeIdProdParaVentajasModalesCSS("#venta_", ":target");
}
