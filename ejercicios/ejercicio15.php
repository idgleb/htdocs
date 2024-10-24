<!-- 
Siguiendo con el ejemplo anterior del array $lista_menu, crear una función llamada buscarItemsPorCategoria($categoria, $lista).
La función deberá buscar dentro de $lista las posiciones que tenga una ‘categoria’ que coincida con el primer parámetro: $categoria.
A diferencia del ejemplo anterior, esta función debe devolvernos un array similar a $lista_menu (array multidimensional), pero en donde sólo se encuentren las posiciones de una misma categoría, $categoria pasada por parámetro.
Por ejemplo:
$categorias_filtradas = buscarItemsPorCategoria('Bebidas', $lista_menu);


foreach($categorias_filtradas as $c_f)
{
    echo "{$c_f['nombre']} <br />";
}

Devuelve lo siguiente:

Coca cola
Fanta
Agua mineral

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

    function buscarItemsPorCategoria($categoria, $lista)
    {
        $arrayResult = [];

        foreach ($lista as $item) {
            if ($item['categoria'] == $categoria) {
                $arrayResult[] = $item;
            }
        }

        return $arrayResult;
    }


    $categorias_filtradas = buscarItemsPorCategoria('Bebidas', $lista_menu);

    foreach ($categorias_filtradas as $c_f) {
        echo "{$c_f['nombre']} <br />";
    }


    ?>

</body>

</html>