<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmación()
    {

        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->host =

        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'ba5cee70e97a01';
        $mail->Password = 'bd9d10d20e4bc3';

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
        $mail->Subject = "Confirma tu Cuenta en la barberia";

        //código html que será generado en el correo
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido = "<p><strong>Hola " . $this->nombre . "</strong> has creado tu cuenta en la barberia, sólo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí para confirmar tu cuenta: <a href='http://localhost:3000/confirmar_cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tú no solicitaste esta cuenta, ignora el mensaje, gracias</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones(){
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->host =

        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'ba5cee70e97a01';
        $mail->Password = 'bd9d10d20e4bc3';

        $mail->setFrom("cuentas@appsalon.com");
        $mail->addAddress("cuentas@appsalon.com", "AppSalon.com");
        $mail->Subject = "Restablecer la Contraseña";

        //código html que será generado en el correo
        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = "<html>";
        $contenido = "<p>Hola <strong>" . $this->nombre . "</strong> has solicitado restablecer tu contraseña, da click en el siguiente enlace para restablecerla</p>";
        $contenido .= "<p>Presiona aquí para cambiar tu contraseña: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Restablecer contraseña</a></p>";
        $contenido .= "<p>Si tú no solicitaste este cambio, ignora este correo</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar el email
        $mail->send();
    }
}
