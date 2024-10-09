<?php
// Obtener el parámetro imgSinExt
$imgSinExt = $_GET['imgSinExt'];

// Supongamos que obtienes los detalles del producto desde la base de datos
// Este es un ejemplo básico; ajusta el código según tu lógica
$producto = obtenerProductoPorImgSinExt($imgSinExt); // Función personalizada para obtener detalles del producto

// Generar el HTML actualizado para la parte específica
?>
<figure>
    <img class="imagen_prod" id="img_<?php echo $imgSinExt; ?>" src="img/<?php echo $producto['img']; ?>" alt="<?php echo $producto['img']; ?>" onclick="seleccionarImagen('<?php echo $imgSinExt; ?>')">
</figure>
<input type="text" value="<?php echo $producto['nombre']; ?>" id="text_<?php echo $imgSinExt; ?>">
<input class="oculto" type="file" id="input_<?php echo $imgSinExt; ?>" onchange="subirImagen('<?php echo $imgSinExt; ?>', '<?php echo $producto['ext']; ?>')">
