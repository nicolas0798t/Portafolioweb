<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $correo = htmlspecialchars($_POST['correo']);
    $tema = htmlspecialchars($_POST['tema']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Dirección de correo a la que se enviará el mensaje
    $destinatario = "tu-correo@dominio.com"; // Cambia esto por tu correo real
    $asunto = "Nuevo mensaje desde el formulario de contacto: $tema";

    // Cuerpo del mensaje
    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Teléfono: $telefono\n";
    $cuerpo .= "Correo: $correo\n";
    $cuerpo .= "Tema: $tema\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";

    // Cabeceras del correo
    $cabeceras = "From: $correo\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";
    $cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Intentar enviar el correo
    if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
        echo "¡Mensaje enviado exitosamente!";
    } else {
        echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo nuevamente.";
    }
} else {
    echo "Método no permitido.";
}
?>
