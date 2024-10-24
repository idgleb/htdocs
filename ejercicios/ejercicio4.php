<!-- Crear dos variables $num1 y $num2, y debajo con un condicional if, verificar si al menos uno de los dos números es negativo.
Si la condición se cumple imprimir por pantalla: “Hay un número negativo”. De lo contrario: “Ninguno de ambos números es negativo”
 -->

<?php
$num1 = 1;
$num2 = -3;

if ($num1 < 0 || $num2 < 0) {
    echo "Hay un numero negativo";
} else echo "Ninguno de ambos numeros es negativo";

?>