<?php

// *** ANTES: SUBIR LOS ARCHIVOS DE LIBRERÍA PHPMailer en una carpeta aparte
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';  //referencia de dónde están los archivos de librería PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Esto es para debuguear y ver problemas. Yo lo deshabilito
    $mail->isSMTP();                                            //envía usando SMTP (usa servidor smtp)
    $mail->Host       = 'vps-ejemplo-x.dattaweb.com';           //Aquí el servidor de corro que te dan en DONWEB (fijate en info en tu casilla de correo)
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contacto@midominio.com';               //SMTP tu email
    $mail->Password   = 'la-Contraseña-De-Tu-Casilla';          //SMTP Contraseña del email desde donde va a salir en mensaje
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                                                //NOTA: el puerto también se ve en información de tu casilla de correo

    //Recipients
    $mail->setFrom('contacto@midominio.com', 'Mi nombre');      //poner email de salida del mensaje
    $mail->addAddress('a.ignaciobello@gmail.com');              //email al que va dirigido

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML (formatea el mensaje en HTML)
    $mail->Subject = 'Asunto importante';                 //Asunto del mensaje
    $mail->Body    = 'Este es el cuerpo del mensaje <b>in bold!</b>'; //Este mensaje tiene un poquito de HTML. Podés poner más código HTML
    $mail->AltBody = 'Este es el texto plano para los no-HTML mails'; //si no acepta HTML aparece el texto plano

    $mail->send();
    echo 'El mensaje fue enviado';
} catch (Exception $e) {
    echo "Hubo un problema. Error: {$mail->ErrorInfo}";
}

?>
