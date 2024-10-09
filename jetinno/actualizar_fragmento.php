<?php
// actualizar_fragmento.php

$imgSinExt = $_GET['imgSinExt'];

// Realiza las consultas necesarias a la base de datos para obtener los datos actualizados
// Por ejemplo:
$row = obtenerDatosProducto($imgSinExt);

// Genera el HTML del fragmento
?>
<figure>
    <img class="imagen_prod" id="img_<?php echo $imgSinExt; ?>" src="img/<?php echo $row['img']; ?>" alt="<?php echo $row['img']; ?>" onclick="seleccionarImagen('<?php echo $imgSinExt; ?>')">
</figure>
<input type="text" value="<?php echo $row['nombre']; ?>" id="text_<?php echo $imgSinExt; ?>">
<input class="oculto" type="file" id="input_<?php echo $imgSinExt; ?>" onchange="subirImagen('<?php echo $imgSinExt; ?>','<?php echo $imgExt; ?>')">