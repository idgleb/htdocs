<?php

require_once "funciones.php";

$cat = $_REQUEST['cat'] ?? null;

$categoriasUnicas = getCategoriasUnicos();

echo $cat;
echo "<br>";
var_dump($categoriasUnicas);

$lista_menu = getMenu($cat);

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

        <form action="menu.php" method="post" class="mb-3">
    
            <label for="cat" class="form-label">Filtrar por categoría</label>
            <select id="cat" name="cat" class="form-control mb-3">

                <option value="">Todo</option>

                <?php foreach ($categoriasUnicas as $item): ?>
                    <option value="<?php echo $item ?>", <?php if ($item==$cat) echo "selected" ?>><?php echo $item ?></option>
                <?php endforeach; ?>

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
                foreach ($lista_menu as $item): ?>

                    <tr class="caption">
                        <td><img src="img/<?php echo $item['categoria'] ?>.png" title="<?php echo $item['categoria'] ?>"> <?php echo $item['categoria'] ?></td>
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

                <?php endforeach; ?>


            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>