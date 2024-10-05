<!DOCTYPE html>

<?php $title="CONTÁCTENOS"; ?>
<?php include 'layout/metedatos_css.php'; ?>

<body>

    <?php include 'layout/header.php'; ?>

    <main>
        <div class="width90centr">
            <h2>CONTÁCTENOS</h2>
        </div>


        <div class="caja_form_mapa">

            <div class="caja_formulario">
                <form action="#ventajamodal" method="POST">
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div>
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" id="ciudad" name="ciudad">
                    </div>
                    <div>
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="4" cols="50"></textarea>
                    </div>
                    <input class="baton_enviar" type="submit" value="Enviar">
                </form>
            </div>

            <iframe id="mapa"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.016888186409!2d-58.38414532495866!3d-34.603734457497914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4aa9f0a6da5edb%3A0x11bead4e234e558b!2z0J7QsdC10LvQuNGB0Log0LIg0JHRg9GN0L3QvtGBLdCQ0LnRgNC10YHQtQ!5e0!3m2!1sru!2sar!4v1718325764845!5m2!1sru!2sar"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

    </main>

    

    <div id="ventajamodal">
        <div class="modal">
            <a href="#">X</a>
            <h2>A la brevedad nos pondremos en contacto con usted</h2>
        </div>
    </div>


<?php include 'layout/footer.php'; ?>

</body>

</html>