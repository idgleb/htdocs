<?php

function obtenerProdDeBase($redirectSiError)
{
    // Conexión a la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'jetinno_base_de_datos44';
    //intentemos a conectar
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = @new mysqli($host, $user, $password, $dbname);
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

function imprimirListaDeIdProdParaVentajasModalesCSS($beforStr, $afterStr)
{
    $redirect = false;
    $result = obtenerProdDeBase($redirect);

    if ($result != null) {
        if ($result->num_rows > 0) :
            $iter = 0;
            while ($row = $result->fetch_assoc()):
                $iter++;
                echo $beforStr . $row['img'] . $afterStr;
                if ($iter != $result->num_rows):
                    echo ",";
                endif;
            endwhile;
        endif;
    }
}
