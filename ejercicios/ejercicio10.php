<!-- Crear una función llamada tresAnimales() que no reciba ningún parámetro y devuelva un array con tres animales diferentes que no se repitan.
Dentro de la función debemos incluir un array con el siguiente formato:
$horoscopo_chino = [
            'rata', 'buey', 'tigre', 'conejo', 'dragón', 'serpiente', 'caballo', 'oveja', 'mono', 'gallo', 'perro', 'cerdo'
 ];

Los tres valores del array que devuelva la función deben ser animales de la lista anterior. -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    function tresAnimales()
    {
        $horoscopo_chino = [
            'rata',
            'buey',
            'tigre',
            'conejo',
            'dragón',
            'serpiente',
            'caballo',
            'oveja',
            'mono',
            'gallo',
            'perro',
            'cerdo'
        ];

        $arraRandomKeys = array_rand($horoscopo_chino, 3);
        $arraTresAnimales = [];
        foreach ($arraRandomKeys as $key){
            $arraTresAnimales[] = $horoscopo_chino[$key];
        }
       
        return $arraTresAnimales;
    }

    var_dump(tresAnimales());

    ?>




</body>

</html>