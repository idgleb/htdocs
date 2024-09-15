<?php

function getMenu($categoria = null)
{
    $lista_menu = [
        ['codigo' => 1, 'nombre' => 'Pizza con jamón y huevo', 'categoria' => 'Pizzas', 'precio' => 2000, 'descuento' => 0],
        ['codigo' => 2, 'nombre' => 'Pizza napolitana', 'categoria' => 'Pizzas', 'precio' => 2500, 'descuento' => 0],
        ['codigo' => 3, 'nombre' => 'Pizza caprese', 'categoria' => 'Pizzas', 'precio' => 2700, 'descuento' => 500],
        ['codigo' => 4, 'nombre' => 'Ensalada caesar', 'categoria' => 'Ensaladas', 'precio' => 800, 'descuento' => 0],
        ['codigo' => 5, 'nombre' => 'Ensalada rusa', 'categoria' => 'Ensaladas', 'precio' => 500, 'descuento' => 0],
        ['codigo' => 6, 'nombre' => 'Hamburguesa simple', 'categoria' => 'Hamburguesas', 'precio' => 900, 'descuento' => 0],
        ['codigo' => 7, 'nombre' => 'Hamburguesa completa', 'categoria' => 'Hamburguesas', 'precio' => 1700, 'descuento' => 400],
        ['codigo' => 8, 'nombre' => 'Coca cola', 'categoria' => 'Bebidas', 'precio' => 300, 'descuento' => 0],
        ['codigo' => 9, 'nombre' => 'Fanta', 'categoria' => 'Bebidas', 'precio' => 300, 'descuento' => 20],
        ['codigo' => 10, 'nombre' => 'Agua mineral', 'categoria' => 'Bebidas', 'precio' => 150, 'descuento' => 0],
        ['codigo' => 11, 'nombre' => 'Helado', 'categoria' => 'Postres', 'precio' => 550, 'descuento' => 50],
        ['codigo' => 12, 'nombre' => 'Flan casero', 'categoria' => 'Postres', 'precio' => 400, 'descuento' => 0],
    ];

    $arrayFiltrado = [];

    if ($categoria){

/*         foreach ($lista_menu as $item){
            if ($categoria==$item['categoria']){
                $arrayFiltrado[] = $item;
            }
        }
        return $arrayFiltrado; */

        return $arrayFiltrado = array_filter($lista_menu, function ($item) use ($categoria) {
            return $categoria==$item['categoria'];
        });


    }else{
        return $lista_menu;
    }
    
}

function getCategoriasUnicos(){

    $arrMenu = getMenu();
    $categoriasUnicas = [];
    foreach ($arrMenu as $item){
        if (!in_array($item['categoria'], $categoriasUnicas)){
            $categoriasUnicas[] = $item['categoria'];
        }
    }

    sort($categoriasUnicas);
    
    return $categoriasUnicas;
}

