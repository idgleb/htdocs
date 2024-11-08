<!DOCTYPE html>

<?php

include_once "funciones.php";

$nombre = sanitario($_REQUEST["nombre"] ?? "");
$email = sanitario($_REQUEST["email"] ?? "");
$ciudad = sanitario($_REQUEST["ciudad"] ?? "");
$mensaje = sanitario($_REQUEST["mensaje"] ?? "");

$avisar = "";

if ($nombre == "") {
    $avisar = $avisar . "<p><div class='text-danger'> Nombre no puede ser vacio </div>";
}
if ($ciudad == "") {
    $avisar = $avisar . "<p><div class='text-danger'> Ciudad no puede ser vacio </div>";
}
if ($mensaje == "") {
    $avisar = $avisar . "<p><div class='text-danger'> Mensaje no puede ser vacio </div>";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $avisar = $avisar . "<p><div class='text-danger'> Email no correcto </div>";
}

if ($avisar == "") {
    $avisar = "A la brevedad nos pondremos en contacto con usted";
}


?>

<?php $title = "CONTÁCTENOS"; ?>
<?php include 'layout/metedatos_css.php'; ?>

<body>

    <!--#ventajamodal -->
    <div id="ventajamodal">
        <div class="modal_cont">
            <a href="#">X</a>
            <h2 id="msg_avizar"><?php echo $avisar ?></h2>
        </div>
    </div>

    <?php include 'layout/header.php'; ?>

    <main>
        <div class="width90centr">
            <h2>CONTÁCTENOS</h2>
        </div>


        <div class="caja_form_mapa">

            <div class="caja_formulario">

                <form id="contactForm" class="container mt-4">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control mb-0" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre, ENT_QUOTES); ?>">
                        <div id="errorNombre" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control mb-0" id="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>">
                        <div id="errorEmail" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad:</label>
                        <input type="text" class="form-control mb-0" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($ciudad, ENT_QUOTES); ?>">
                        <div id="errorCiudad" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea class="form-control mb-0" id="mensaje" name="mensaje" rows="4"><?php echo htmlspecialchars($mensaje, ENT_QUOTES); ?></textarea>
                        <div id="errorMensaje" class="text-danger"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>

                <!-- Agrega un contenedor para mostrar mensajes -->
                <div id="formMessage"></div>

                <script src="https://cdn.jsdelivr.net/npm/validator@latest/validator.min.js"></script>

                <script>
                    const contactForm = document.getElementById('contactForm');
                    const nombreCampo = document.getElementById('nombre');
                    const emailCampo = document.getElementById('email');
                    const ciudadCampo = document.getElementById('ciudad');
                    const mensajeCampo = document.getElementById('mensaje');

                    const msg_avizar = document.getElementById('msg_avizar');

                    const errorNombre = document.getElementById('errorNombre');
                    const errorEmail = document.getElementById('errorEmail');
                    const errorCiudad = document.getElementById('errorCiudad');
                    const errorMensaje = document.getElementById('errorMensaje');


                    nombreCampo.addEventListener('input', function() {
                        if (!nombreCampo.value.trim()) {
                            errorNombre.innerText = "El nombre es requerido.";
                        } else {
                            errorNombre.innerText = "";
                        }
                    });

                    // Validación del campo 'email' con validator.js  
                    emailCampo.addEventListener('input', function() {
                        if (!emailCampo.value.trim()) {
                            errorEmail.innerText = 'El email es requerido.';
                        } else if (!validator.isEmail(emailCampo.value.trim())) {
                            errorEmail.innerText = 'Por favor, introduce un email válido.';
                        } else {
                            errorEmail.innerText = '';
                        }
                    });

                    ciudadCampo.addEventListener('input', function() {
                        if (!ciudadCampo.value.trim()) {
                            errorCiudad.innerText = "El ciudad es requerido.";
                        } else {
                            errorCiudad.innerText = "";
                        }
                    });

                    mensajeCampo.addEventListener('input', function() {
                        if (!mensajeCampo.value.trim()) {
                            errorMensaje.innerText = "El mensaje es requerido.";
                        } else {
                            errorMensaje.innerText = "";
                        }
                    });


                    document.addEventListener('DOMContentLoaded', function() {

                        contactForm.addEventListener('submit', function(event) {
                            event.preventDefault(); // Evitar el comportamiento predeterminado del formulario

                            const formData = new FormData(contactForm);

                            fetch('subir_formulario.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Error en la respuesta de la red');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    manejarRespuesta(data);
                                })
                                .catch(error => {
                                    console.error('Error:', error); // Mostrar cualquier error en la consola
                                    formMessage.style.color = 'red';
                                    formMessage.textContent = 'Ocurrió un error al enviar el formulario.';
                                });
                        });
                    });


                    function manejarRespuesta(data) {

                        console.log(data); // Mostrar la respuesta completa en la consola para depurar

                        if (data.msg) {
                            formMessage.textContent = "Tu mensaje enviado con exito";
                            nombreCampo.value = '';
                            emailCampo.value = '';
                            ciudadCampo.value = '';
                            mensajeCampo.value = '';

                            msg_avizar.innerText = data.msg;
                            window.location.href = "#ventajamodal";
                        } else formMessage.textContent = '';

                        if (data.nombre === "") {
                            errorNombre.textContent = "Nombre no puede ser vacio"; // Mostrar mensaje de error
                        } else errorNombre.textContent = "";

                        if (data.email === "") {
                            errorEmail.textContent = "Email no correcto"; // Mostrar mensaje de error
                        } else errorEmail.textContent = "";

                        if (data.ciudad === "") {
                            errorCiudad.textContent = "Ciudad no puede ser vacio"; // Mostrar mensaje de error
                        } else errorCiudad.textContent = "";

                        if (data.message === "") {
                            errorMensaje.textContent = "Mensaje no puede ser vacio"; // Mostrar mensaje de error
                        } else errorMensaje.textContent = "";

                    }
                </script>




            </div>

        </div>

    </main>





    <?php include 'layout/footer.php'; ?>

</body>

</html>