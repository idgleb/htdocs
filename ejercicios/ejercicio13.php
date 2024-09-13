<!-- Crear una función llamada agregarItem($valor, &$lista), que reciba dos parámetros: un string y un array.
Si $valor NO existe dentro del array $lista, entonces deberá agregarse en dicha lista. 
Importante: el parámetro $lista debe escribirse tal cual como se menciona con el signo: “&” delante de $lista (&$lista) para que el array se pase por referencia y así pueda modificar el contenido dentro de la función.

El resultado debe ser:

Perro
Gato
Conejo
Tortuga

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

    function agregarItem($valor, &$lista)
    {
        if (!in_array($valor, $lista)) {
            $lista[] = $valor;
        }
    }

    $animales = ['Perro', 'Gato', 'Conejo'];

    agregarItem('Tortuga', $animales);
    agregarItem('Conejo', $animales);

    foreach ($animales as $a) {
        echo "{$a} <br />";
    }




    ?>
</body>

</html>