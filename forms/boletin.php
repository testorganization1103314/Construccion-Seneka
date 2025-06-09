<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $correo = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Correo inválido.";
        exit;
    }

    $archivo = fopen("../correos.txt", "a");
    fwrite($archivo, $correo . PHP_EOL);
    fclose($archivo);
    
    echo "Se ha enviado tu solicitud para estar al tanto. ¡Gracias!";
} else {
    http_response_code(400);
    echo "No se recibió ningún correo.";
}
?>
