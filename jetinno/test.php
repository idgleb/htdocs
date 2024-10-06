<?php
//agregar productos
//guardar errorres a base
//crear base si no existe

include_once "funciones.php";

?>

#ventajamodal,
<?php
imprimirListaDeIdProdParaVentajasModalesCSS("#venta_", "");
?>

<p></p>


#ventajamodal:target,
<?php
imprimirListaDeIdProdParaVentajasModalesCSS("#venta_", ":target");
?>
