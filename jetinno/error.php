<!DOCTYPE html>



<?php
include_once "funciones.php";

$error = sanitario($_REQUEST["error"]);

$title = "CHE, ERROR";
include 'layout/metedatos_css.php';

?>

<body>

    

    <main>
        <div class="width90centr">
            <h2>CHE, COMO TE VA? Creo que no tenes suerte, porque hubo un error:</h2>
            <h3><?php echo $error ?></h3>
        </div>

    </main>


   

</body>

</html>