<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body >
    <header>
        <?php include("layaut/_navbar.php") ?>

    </header>
    <main class="col-10 mx-auto">
        <?php include("layaut/_carusel.php") ?>

        <section class="row">

            <?php include("layaut/_card.php") ?>

            <?php include("layaut/_card.php") ?>

            <?php include("layaut/_card.php") ?>

            <?php include("layaut/_card.php") ?>

        </section>

    </main>
    <footer>
        <p>Clase final</p>
    </footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>