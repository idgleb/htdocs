<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Hola Tomson</h1>

<ul>
<li><a href="tabla.php?num=2">Tabla 2</a></li>
<li><a href="tabla.php?num=3">Tabla 3</a></li>
<li><a href="tabla.php?num=4">Tabla 4</a></li>
</ul>

<form action="tabla.php" method="post">
    <input type="number" name="num" placeholder="Ingrese el numero">
    <button type="submit">Calcular</button>
</form>

<h1>
<?php
$num1 = 9;
$num2 =9;

$resultado = ($num1 == $num2) ? 'Los':'NoLos';

echo $resultado;

$variable = "ffff";
$edad = 10;
$num = 5;
$res = $edad + $num;



echo "Hola  $variable<p>";
echo 'lol '.$variable." ".$res;

echo "<p>";

echo $_SERVER["SERVER_PORT"];

echo '<pre>';
echo var_dump($_SERVER);
echo '</pre>';

?>
</h1>

    
</body>
</html>