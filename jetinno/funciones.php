<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'jetinno_base_de_datos';

function conectarDB($redirectSiError = true)
{
    global $host, $user, $password, $dbname;
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conexion = new mysqli($host, $user, $password);
        $conexion->query("CREATE DATABASE IF NOT EXISTS $dbname");
        $conexion->select_db($dbname);
        // Crear la tabla si no existe  
        $tabla = "CREATE TABLE IF NOT EXISTS productos (  
            id INT AUTO_INCREMENT PRIMARY KEY,  
            nombre VARCHAR(255) NOT NULL,  
            img VARCHAR(255) NOT NULL,  
            caracteristicas TEXT NOT NULL  
        )";
        $conexion->query($tabla);
        return $conexion;
    } catch (mysqli_sql_exception $e) {
        if (isset($conexion)) {
            $conexion->close();
        }
        manejarError($e, "Error en la connexion de base de datos", $redirectSiError);
    }
}

function manejarError($e, $msg, $redirectSiError)
{
    error_log(date('Y-m-d H:i:s') . " - " . $e->getMessage() . "\n", 3, "error_log.txt");
    if ($redirectSiError) {
        if (!headers_sent()) {
            header("Location: error.php?error=" . urlencode($msg));
            die();
        } else {
            echo "<script>window.location.href='error.php?error=" . $msg . "';</script>";
            die();
        }
    }
    die();
}



function sanitario($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function obtenerProdDeBase($redirectSiError, $limit = null, $offset = null)
{
    // Intentemos conectar
    try {
        // Conexión a la base de datos
        $conn = conectarDB($redirectSiError);
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
        manejarError($e, "Paso algo malo", $redirectSiError);
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
    try {
        $conn = conectarDB(true);
        $stmt = $conn->prepare("SELECT * FROM productos WHERE img = ?");
        $stmt->bind_param('s', $nombreImagen);
        $stmt->execute();
        $result = $stmt->get_result(); 
        if ($result->num_rows > 0) {
            $producto = $result->fetch_assoc();
        } else {
            $producto = null;
        }
        $stmt->close();
        $conn->close();
        return $producto;
    } catch (mysqli_sql_exception $e) {
        manejarError($e, "Paso algo malo", true);
        if (isset($stmt)) {
            $stmt->close();
        }
        if (isset($conn)) {
            $conn->close();
        }
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

function listaImgProdCaorregir(){
    imprimirListaDeIdProdParaVentajasModalesCSS("#img_", ":hover");

}


function mostrarBotonesNav($paginaActual, $totalPaginas, $conID = null)
{
    // Mostrar los botones de paginacion con Bootstrap
    if ($conID !== null){
        echo '<nav id="navv">';
    }else{
        echo '<nav>';
    }
    
    echo '<ul class="pagination justify-content-center">';
    // Enlace a la primera página
    if ($paginaActual > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=1#navv">&laquo;</a></li>';
    }
    // Enlace a la página anterior
    if ($paginaActual > 1) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($paginaActual - 1) . '#navv">&lsaquo;</a></li>';
    }
    // Mostrar un rango de enlaces de páginas (por ejemplo, máximo 5)
    $rango = 5; // Rango de páginas antes y después de la página actual
    $inicio = max(1, $paginaActual - $rango);
    $fin = min($totalPaginas, $paginaActual + $rango);
    if ($inicio > 1) {
        echo '<li class="page-item disabled"><span class="page-link">..</span></li>';
    }
    for ($i = $inicio; $i <= $fin; $i++) {
        if ($i == $paginaActual) {
            echo '<li class="page-item"><span class="page-link bg-primary text-white" >' . $i . '</span></li>'; // Página actual
        } else {
            echo '<li class="page-item"><a class="page-link" href="?pagina=' . $i . '#navv">' . $i . '</a></li>';
        }
    }
    if ($fin < $totalPaginas) {
        echo '<li class="page-item disabled"><span class="page-link">..</span></li>';
    }
    // Enlace a la página siguiente
    if ($paginaActual < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=' . ($paginaActual + 1) . '#navv">&rsaquo;</a></li>';
    }
    // Enlace a la última página
    if ($paginaActual < $totalPaginas) {
        echo '<li class="page-item"><a class="page-link" href="?pagina=' . $totalPaginas . '#navv">&raquo;</a></li>';
    }
    echo '</ul>';
    echo '</nav>';
}

function calcularTotalPaginas($productosPorPagina)
{
    try {
        $conn = conectarDB(true);
        $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM productos");
        if ($stmt === false) {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        // Obtener el número total de productos
        $totalProductos = $result->fetch_assoc()['total'];
        // Calcular el número total de páginas
        $totalPaginas = ceil($totalProductos / $productosPorPagina);
        $stmt->close();
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        manejarError($e, "Paso algo malo", true);
    } catch (Exception $e) {
        manejarError($e, "error inesperado", true);
    }
    return $totalPaginas;
}
