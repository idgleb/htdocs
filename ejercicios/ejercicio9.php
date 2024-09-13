<!-- Crear una función llamada tresNumeros() que no reciba ningún parámetro y devuelva un array con tres números aleatorios del 0 al 9 que no se repitan. -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    function tresNumeros()
    {
        $arraTresNumeros = [];

        for ($i = 0; $i < 3; $i++) {
            do {
                $numAleatorio = random_int(0, 9);
            } while (in_array($numAleatorio, $arraTresNumeros));
            $arraTresNumeros[] = $numAleatorio;
        }
        return $arraTresNumeros;
    }

    var_dump(tresNumeros());

    ?>


</body>

</html>