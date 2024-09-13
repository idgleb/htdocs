<?php

function getMenu() {
    return [
    ['codigo' => 1, 'nombre' => 'Pizza con jamón y huevo', 'categoria' => 'Pizzas', 'precio' => 20000, 'descuento' => 0],
    ['codigo' => 2, 'nombre' => 'Pizza napolitana', 'categoria' => 'Pizzas', 'precio' => 25000, 'descuento' => 0],
    ['codigo' => 3, 'nombre' => 'Pizza caprese', 'categoria' => 'Pizzas', 'precio' => 27000, 'descuento' => 5000],
    ['codigo' => 4, 'nombre' => 'Ensalada caesar', 'categoria' => 'Ensaladas', 'precio' => 8000, 'descuento' => 0],
    ['codigo' => 5, 'nombre' => 'Ensalada rusa', 'categoria' => 'Ensaladas', 'precio' => 5000, 'descuento' => 0],
    ['codigo' => 6, 'nombre' => 'Hamburguesa simple', 'categoria' => 'Hamburguesas', 'precio' => 9000, 'descuento' => 0],
    ['codigo' => 7, 'nombre' => 'Hamburguesa completa', 'categoria' => 'Hamburguesas', 'precio' => 17000, 'descuento' => 4000],
    ['codigo' => 8, 'nombre' => 'Coca cola', 'categoria' => 'Bebidas', 'precio' => 3000, 'descuento' => 0],
    ['codigo' => 9, 'nombre' => 'Fanta', 'categoria' => 'Bebidas', 'precio' => 3000, 'descuento' => 200],
    ['codigo' => 10, 'nombre' => 'Agua mineral', 'categoria' => 'Bebidas', 'precio' => 1500, 'descuento' => 0],
    ['codigo' => 11, 'nombre' => 'Helado', 'categoria' => 'Postres', 'precio' => 5500, 'descuento' => 500],
    ['codigo' => 12, 'nombre' => 'Flan casero', 'categoria' => 'Postres', 'precio' => 4000, 'descuento' => 0]
    ];
}

function getCategoriasMenu() {
   
    $menu = getMenu();
  
    $categorias = [];
  
    foreach ($menu as $item) {
        if (!in_array($item['categoria'], $categorias)) {
            $categorias[] = $item['categoria'];
        }
    }

    return $categorias;
}


$categorias = getCategoriasMenu();

sort($categorias);

echo "Categorías : ";

var_dump($categorias);




