<!-- Crear dos variables $num1 y $num2 y verificar con un condicional if si el primero es menor al segundo.
Si la condición se cumple imprimir por pantalla todos los números que hay desde el primero (incluido) hasta el segundo (incluido) con un ciclo de repetición for.

Por ejemplo las siguientes variables:
$num1 = 1;
$num2 = 10;

Debería mostrar por pantalla lo siguiente:

1
2
3
4
5
6
7
8
9
10
 -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$num1 = 3;
$num2 = 7; 
?>

<?php if ($num1 < $num2): ?>
    <ul class='list-unstyled'>
        <?php for ($i = $num1; $i <= $num2; $i++): ?>
            <li><?php echo $i?></li>
        <?php endfor ?>
    </ul>
<?php endif ?>
    
</body>
</html>

