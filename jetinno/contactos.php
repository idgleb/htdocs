<!DOCTYPE html>

<?php

include_once "funciones.php";

$nombre = sanitario($_REQUEST["nombre"] ?? "");
$email = sanitario($_REQUEST["email"] ?? "");
$ciudad = sanitario($_REQUEST["ciudad"] ?? "");
$mensaje = sanitario($_REQUEST["mensaje"] ?? "");

$avisar = "";

if ($nombre == "") {
    $avisar = $avisar."<p><div class='text-danger'> Nombre no puede ser vacio </div>";
}
if ($ciudad == "") {
    $avisar = $avisar."<p><div class='text-danger'> Ciudad no puede ser vacio </div>";
}
if ($mensaje == "") {
    $avisar = $avisar."<p><div class='text-danger'> Mensaje no puede ser vacio </div>";
}

if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $avisar = $avisar."<p><div class='text-danger'> Email no correcto </div>";
}

if ( $avisar==""){
     $avisar="A la brevedad nos pondremos en contacto con usted";
}


?>

<?php $title = "CONTÁCTENOS"; ?>
<?php include 'layout/metedatos_css.php'; ?>

<body>

    <?php include 'layout/header.php'; ?>

    <main>
        <div class="width90centr">
            <h2>CONTÁCTENOS</h2>
        </div>


        <div class="caja_form_mapa">
            <!--#ventajamodal -->
            <div class="caja_formulario">
                <form action="contactos.php#ventajamodal" method="POST">
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $email ?>">
                    </div>
                    <div>
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad" value="<?php echo $ciudad ?>">
                    </div>
                    <div>
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="4" cols="50"><?php echo $mensaje ?></textarea>
                    </div>
                    <input class="baton_enviar" type="submit" value="Enviar">
                </form>
            </div>

            <iframe class="caja_formulario"  id="mapa"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.016888186409!2d-58.38414532495866!3d-34.603734457497914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4aa9f0a6da5edb%3A0x11bead4e234e558b!2z0J7QsdC10LvQuNGB0Log0LIg0JHRg9GN0L3QvtGBLdCQ0LnRgNC10YHQtQ!5e0!3m2!1sru!2sar!4v1718325764845!5m2!1sru!2sar"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

    </main>



    <div id="ventajamodal">
        <div class="modal_cont">
            <a href="#">X</a>
            <h2><?php echo $avisar ?></h2>
        </div>
    </div>


    <?php include 'layout/footer.php'; ?>

</body>

</html>