
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$saldo = 10000;
$costos = [
    [
        'detalle' => 'Teclado para computadora',
        'precio' => 2000
    ],
    [
        'detalle' => 'Mouse',
        'precio' => 144000
    ],
    [
        'detalle' => 'Auriculares',
        'precio' => 5000
    ]
];
$total = 0;

foreach ($costos as $costo){
    $total+=$costo['precio'];
}

if ($saldo>=$total){
    $saldo-=$total;
    echo "Susaldo actual es ".$saldo;
}else echo "Saldo insuficiente hehehe";

?>

    
</body>
</html>