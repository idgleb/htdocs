<!-- 
 Vamos a crear una función llamada buscarItemPorCodigo($codigo, $lista).
(Aclaración el array $lista_menu NO va dentro de la función, sino que se va a pasar como parámetro en el lugar de $lista)
La función deberá buscar dentro de $lista la posición que tenga un ‘codigo’ que coincida con el primer parámetro: $codigo.
De encontrar esa posición deberá devolver la misma, de no hacerlo deberá devolver null. Aclaración: los códigos NO se repiten, así que de encontrar el código, sólo puede ser una posición, no hay dos o más posiciones con el mismo código.

Pruebas:

var_dump(buscarItemPorCodigo(9, $lista_menu));

Devuelve un array:

array(3) { ["codigo"]=> int(9) ["nombre"]=> string(6) "Helado" ["categoria"]=> string(6) "Postre" }

var_dump(buscarItemPorCodigo(15, $lista_menu));

Devuelve NULL

 -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $lista_menu = [
        ['codigo' => 1, 'nombre' => 'Pizza con jamón y huevo', 'categoria' => 'Pizzas'],
        ['codigo' => 2, 'nombre' => 'Pizza napolitana', 'categoria' => 'Pizzas'],
        ['codigo' => 3, 'nombre' => 'Pizza caprese', 'categoria' => 'Pizzas'],
        ['codigo' => 4, 'nombre' => 'Ensalada caesar', 'categoria' => 'Ensaladas'],
        ['codigo' => 5, 'nombre' => 'Ensalada rusa', 'categoria' => 'Ensaladas'],
        ['codigo' => 6, 'nombre' => 'Coca cola', 'categoria' => 'Bebidas'],
        ['codigo' => 7, 'nombre' => 'Fanta', 'categoria' => 'Bebidas'],
        ['codigo' => 8, 'nombre' => 'Agua mineral', 'categoria' => 'Bebidas'],
        ['codigo' => 9, 'nombre' => 'Helado', 'categoria' => 'Postre'],
        ['codigo' => 10, 'nombre' => 'Flan casero', 'categoria' => 'Postre']
    ];

    function buscarItemPorCodigo($codigo, $lista)
    {
        $pos = 0;
        $arrayResult = null;
        while ($pos < count($lista) && $arrayResult == null) {
            if ($lista[$pos]['codigo'] == $codigo) {
                $arrayResult = $lista[$pos];
            }
            $pos++;
        }
        return $arrayResult;
    }

    var_dump(buscarItemPorCodigo(9, $lista_menu));

    echo "<br>";

    var_dump(buscarItemPorCodigo(15, $lista_menu));


    ?>

</body>

</html>