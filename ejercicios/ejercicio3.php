<!-- Crear dos variables $num1 y $num2, y debajo con un condicional if, verificar si ambos números son par.
Si la condición se cumple imprimir por pantalla: “Ambos números son par”. De lo contrario: mostrar el texto “Uno o ambos números no son par” -->

<?php

$num1 = 4;
$num2 = 2;

if ($num1 % 2 == 0 && $num2 % 2 == 0){
    echo "Ambos numeros son par";

}else{
    echo "Uno o ambos numeros no son par";

}

?>
