<?php

namespace App\Services;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

use Illuminate\Support\Facades\Mail;

class email_service
{
    public function sendEmailOptica($validated, $origen)
    {
        //hacer test en ruta: ?test=false
        $test = request()->query('test'); //pendiente OJO (esto está recibiendo test por get)

        $nombre = $validated['nombre'];
        $apellidos = $validated['apellidos'];
        $email = $validated['email'];
        $movil = $validated['movil'];

        $mail = new PHPMailer(true);
        
        try{

            // SMTP configuration
            $mail->CharSet = 'UTF-8';
            $mail->SMTPAuth = true;
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->Port = config('mail.mailers.smtp.port');
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->isHTML(true);

            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->addAddress($email, $nombre . ' ' . $apellidos);

            $mail->Subject = 'Asunto del correo';
            $mail->Body = 'Contenido del correo';

            $mail->send();

            return true;

        }catch (Exception $e) {

			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
        
        //return "Email enviado!"; 
    }
}
