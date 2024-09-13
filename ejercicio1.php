<?php
$nombre = "Goga";

$arrayFrut = ["Naranj", "Manz", "Pera"];

echo "Hola, $nombre, $arrayFrut[0]";

echo "<ul>";
for ($i = 0; $i < count($arrayFrut); $i++){
    echo "<li>$arrayFrut[$i]";
}
echo "</ul>";

echo "<ul>";
foreach ($arrayFrut as $i => $frut){
    echo "<li>$i $frut";
}
echo "</ul>";


$jugador = [
    'nombre' => 'Vasy',
    'apellido' => 'Dors'
];





?>

