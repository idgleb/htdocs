
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$resultado = compararNumeros(10, 50);
echo $resultado;

function compararNumeros($a, $b) {

    if ($a>$b){
        echo "$a es mayor a $b";
    }

    if ($a<$b){
        echo "$a es menor a $b";
    }

    if ($a==$b){
        echo "$a es igual a $b";
    }

}

?>

    
</body>
</html>