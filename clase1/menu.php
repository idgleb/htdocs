<?php

require_once 'ej33.php';

$categorias = getCategoriasMenu();

sort($categorias);

$cat = $_REQUEST['cat'] ?? null;

echo $cat;

$lista_menu = [
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

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Ejercicio foreach </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <h1 class="text text-center"> Menú </h1>

    <form action="menu.php" method="post">
    <label for="cat" class="form-label">Filtrar por categoría</label>
    <select id="cat" name="cat" class="form-control">

    

    <?php : ?>

        <option value="Pizzas">Pizzas</option>
        <option value="Ensaladas">Ensaladas</option>
        <option value="Hamburguesas">Hamburguesas</option>
        <option value="Bebidas">Bebidas</option>

    </select>
    <button type="submit" class="btn btn-primary">Filtrar</button>
   </form>

    <table class="table table-bordered">

        <thead>
        <tr>
            <th> Categoría</th>
            <th> Nombre</th>
            <th> Precio</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($lista_menu as $item):?>

<?php if ($item['categoria']==$cat): ?>



            <tr class="caption">
                <td><img src="img/<?php echo $item['categoria']?>.png" title="<?php echo $item['categoria']?>"> <?php echo $item['categoria']?></td>
                <td> <?php echo $item['nombre'] ?></td>
                <td>
                    <?php if ($item['descuento'] == 0): ?>
                        <?php echo $item['precio']; ?>
                    <?php else: ?>
                        <span class="text-success"><?php echo $item['precio'] - $item['descuento']; ?></span>
                        <span class="text-decoration-line-through"><?php echo " " . $item['precio']; ?></span>
                    <?php endif; ?>
                </td>
            </tr>

            <?php endif; ?>


        <?php endforeach; ?>


        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>