<?php
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim($_POST['nombre'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $mensaje = isset($_POST['mensaje']) ? htmlspecialchars(trim($_POST['mensaje'])) : '';

    // Validar que los campos requeridos no estén vacíos
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        echo json_encode([
            "status" => "error",
            "message" => "Por favor, complete todos los campos requeridos."
        ]);
        exit;
    }

    // Validar formato de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            "status" => "error",
            "message" => "El formato del correo electrónico es inválido."
        ]);
        exit;
    }

    // Aquí se podría enviar un correo o guardar en base de datos.
    echo json_encode([
        "status" => "success",
        "message" => "Formulario enviado con éxito."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Método de solicitud no soportado."
    ]);
}
?>
