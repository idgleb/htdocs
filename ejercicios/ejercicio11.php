<!-- Crear una función llamada validarTexto($texto, $min_length, $max_length), que reciba tres parámetros y valide que:
$texto: El texto no sea una cadena vacía, por ejemplo: ‘’ (comillas vacías) o ‘   ’ (comillas vacías con sólo espacios) Abstenerse de usar expresiones regulares.
$min_length: La cantidad de caracteres de $texto no puede ser menor a $min_length.
$max_length: La cantidad de caracteres de $texto no puede ser mayor a $max_length.
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

    function validarTexto($texto, $min_length, $max_length)
    {

        if ($texto == null || trim($texto) == "") return false;

        if (strlen($texto) < $min_length || strlen($texto) > $max_length) return false;

        return true;
    };

    var_dump(validarTexto("888f8d", 2, 5)) ;

    ?>




</body>

</html>