<?php ?>
<?php ?>

<?php
include_once("fun.php");
$legajo = $_REQUEST["legajo"] ?? null;
echo $legajo . "   ";

$empleadoPorLegajo = [];
$empleadoPorLegajo = getEmpleoPorLegajo($legajo);
var_dump($empleadoPorLegajo);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php if ($empleadoPorLegajo): ?>
        <?php foreach ($empleadoPorLegajo as $item): ?>

            <div class="card m-5" style="width: 18rem;">
                <div class="card-header">
                    <img src="avatares/<?php if ($empleadoPorLegajo) echo $empleadoPorLegajo[0]['avatar'] ?>" alt="<?php if ($empleadoPorLegajo) echo $empleadoPorLegajo[0]['avatar'] ?> ">
                </div>

                <div class="card-body">
                    <h5 class="card-title"> <?php if ($empleadoPorLegajo) echo $empleadoPorLegajo[0]['nombre'] ?> </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>



    <form action="index.php" method="get" class="m-5">
        <label for="legajo" class="form-lable m-1">Legajo</label>
        <input type="number" value="<?php if ($empleadoPorLegajo) echo $empleadoPorLegajo[0]['legajo'] ?>" name="legajo" id="legajo" placeholder="Ingrese legajo" class="form-control m-1">
        <button type="submit" class="btn btn-primary m-1">Buscar</button>
    </form>



    <?php ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>