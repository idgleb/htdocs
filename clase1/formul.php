<?php

require_once "funciones.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
 header("Location: res_form.php");
}

$res = $_REQUEST;

var_dump($res);


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
        <h1 class="text text-center"> CHEGEVARA </h1>

        <form action="formul.php" method="post" class="mb-3">

            <label for="cat" class="form-label">Ingresa datos boludo</label>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text"  class="form-control" id="nombre" aria-describedby="nombre che" required>
                
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name = "servicios[]" value="cable" id="cable">
                <label class="form-check-label" for="cable">
                    Cable
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name = "servicios[]" value="internet" id="internet" checked>
                <label class="form-check-label" for="internet">
                    Internet
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name = "servicios[]" value="telefono" id="telefono" >
                <label class="form-check-label" for="telefono">
                    Telefono
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Vamos che</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>