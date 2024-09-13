<!-- Crear una función llamada validarNumero($numero, $min, $max),que reciba tres parámetros y valide que:
$numero: Sea un valor numérico. Ayuda: is_numeric($numero) es una función que devuelve true si el valor pasado como parámetro es número, y false si no es así.
$min: El valor de $numero no puede ser menor a $min.
$max: El valor de $numero no puede ser mayor a $max.
En caso que la función valide correctamente debe retornar true, sino false. -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function validarNumero($numero, $min, $max){
        return is_numeric($numero) && !($numero<$min || $numero>$max);}

    var_dump(validarNumero(55,2,63));

    ?>
</body>

</html>