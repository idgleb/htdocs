<?php
$numer = intval($_REQUEST['num'] ?? 0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<ul>
    <?php for ($i = 1; $i < 10; $i++): ?>
    <li><?php echo "$i * $numer = " . ($i * $numer)?> </li>
    <?php endfor ?>
</ul>








<a href="index.php">Volver</a>

    
</body>
</html>