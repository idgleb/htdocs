<?php

function obtenerProdDeBase()
{
    // Conexión a la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'jetinno_base_de_datos';
    //intentemos a conectar
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = new mysqli($host, $user, $password, $dbname);
    } catch (mysqli_sql_exception $e) {
        die("Conexión fallida: " . $e->getMessage());
    }
    // Consulta para obtener los productos
    $sql = "SELECT id, nombre, img, caracteristicas FROM productos";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function imprimirListaDeIdProdParaVentajasModales($beforStr, $afterStr)
{
    $result = obtenerProdDeBase();
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
