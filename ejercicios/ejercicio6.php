
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$saldo = 11000;

$costos = [2000, 1000, 5000];

$total = 0;

foreach ($costos as $costo){
    $total+=$costo;
}

if ($saldo>=$total){
    $saldo-=$total;
    echo "Susaldo actual es ".$saldo;
}else echo "Saldo insuficiente";

?>

    
</body>
</html>