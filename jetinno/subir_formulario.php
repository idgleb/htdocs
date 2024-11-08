<?php
// Configurar el encabezado para devolver un contenido JSON
header('Content-Type: application/json');

include_once "funciones.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $text = sanitario($_POST['text'] ?? '');
    $imgSinExt = sanitario($_POST['imgSinExt'] ?? '');
    $extension = sanitario($_POST['extension'] ?? '');
    $tipo = sanitario($_POST['tipo'] ?? '');
    $nombreImagen = $imgSinExt . '.' . $extension;

    // Verificar si los datos han sido enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger los valores enviados desde el formulario
        $nombre = isset($_POST['nombre']) ? sanitario($_POST['nombre']) : '';
        $email = isset($_POST['email']) ? sanitario($_POST['email']) : '';
        $ciudad = isset($_POST['ciudad']) ? sanitario($_POST['ciudad']) : '';
        $mensaje = isset($_POST['mensaje']) ? sanitario($_POST['mensaje']) : '';

        // Validar que los campos requeridos no estén vacíos

        // Validar formato de correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = "";
        }

        $response = [
            "nombre" => $nombre,
            "email" => $email,
            "ciudad" => $ciudad,
            "message" => $mensaje,
        ];

        if ($response['nombre'] == "" || $response['email'] == "" || $response['ciudad'] == "" || $response['message'] == "") {
            echo json_encode($response);
            exit;
        }

        try {
            $conn = conectarDB();

            $tabla = "CREATE TABLE IF NOT EXISTS email (  
                id INT AUTO_INCREMENT PRIMARY KEY,  
                nombre VARCHAR(255) NOT NULL,  
                email VARCHAR(255) NOT NULL,  
                ciudad VARCHAR(255) NOT NULL,
                mensaje TEXT NOT NULL  
            )";
            $conn->query($tabla);

            $stmt = $conn->prepare("INSERT INTO email (nombre, email, ciudad, mensaje) VALUES (?, ?, ?, ?)"); //preparar una consulta SQL que se ejecutará mas tarde
            $stmt->bind_param("ssss", $nombre, $email, $ciudad, $mensaje);  // enlaza los tres valores a los tres placeholders ? 
            // Ejecutar la consulta 
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo json_encode(["msg" => "A la brevedad nos pondremos en contacto con usted."]);
        } catch (mysqli_sql_exception $e) {
            echo json_encode(["msg" => "Paso algo malo..."]);
        }





    } else {
        echo json_encode(["msg" => "Método de solicitud no soportado."]);
        exit;
    }
}
