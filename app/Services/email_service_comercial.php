<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\solicitudes_comerciales;

use Illuminate\Support\Facades\Mail;

class email_service_comercial
{
    public function sendEmailComercial($validated, $test, $locale, $origen, $logoOptica, $telefono_optica, $mail_optica){

        $optica = $validated['optica'];
        $codigo = $validated['codigo'];
        $nombre = $validated['nombre'];
        $email_cliente = $validated['email'];
        $unidad = $validated['unidad'];
        $fecha = date("Y-m-d H:i:s");

        $mail = new PHPMailer(true);

        try {

            // SMTP configuration
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 3; // O 4 para más detalle
            $mail->Debugoutput = 'html'; // Para salida HTML
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->Port = config('mail.mailers.smtp.port');
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->isHTML(true);


            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->Subject = 'Kit solicitado por '. $optica;

            $archivo = resource_path('views/pages/mail/'.$locale.'/kitOpticaComprobante.blade.php');

            $palabrasBuscar = array(
                '{NOMBREOPTICA}', '{CONTACTO}', '{ORIGIN}', '{CODIGO}',
                '{UNIDAD}', '{FECHA}', '{EMAILOPTICO}', '{LOGO}'
            );


            $palabrasReemplazar = array($optica, $nombre, $origen, $codigo, $unidad, $fecha, $email_cliente, $logoOptica);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;


            if ($test == 'true') {
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');
            } else {
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');

                //$mail->addAddress('a.debeascoa@naturalopticsgroup.com');
				//$mail->addCC('d.hernandez@naturalopticsgroup.com');

                //función que envía email al cliente 
                //$this->sendMessageClient($optica, $nombre, $email_cliente, $unidad, $locale, $fecha, $codigo, $origen, $logoOptica);
            }



            try {
                // Enviar el correo
                $mail->send();
                return response()->json(['message' => 'Email enviado correctamente.']);
            } catch (Exception $e) {
                // Manejo de errores
                return response()->json(['message' => "No se pudo enviar el email. Error: {$mail->ErrorInfo}"], 500);
            }

            return true;
        } catch (Exception $e) {

            echo "No se pudo enviar el email. Error: {$mail->ErrorInfo}";
        }

        //return "Email enviado!"; 

    }

    function sendMessageClient($optica, $nombre, $email_cliente, $unidad, $locale, $fecha, $codigo, $origen, $logoOptica)
    {

        $pedido = new solicitudes_comerciales();
        $mail = new PHPMailer(true);

        try {

            // SMTP configuration
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 3; // O 4 para más detalle
            $mail->Debugoutput = 'html'; // Para salida HTML
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->Port = config('mail.mailers.smtp.port');
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->isHTML(true);


            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->Subject = 'Confirmación de solicitud de cita previa';
            //dd($mail);

            $archivo = resource_path('views/pages/mail/'.$locale.'/kitOpticaComprobante.blade.php');


            $palabrasBuscar = array(
                '{DIRECIONOPTICA}', '{TELEFONOPTICA}', '{EMAILOPTICA}',
                '{NOMBREOPTICA}', '{LOGO}'
            );

            $palabrasReemplazar = array($optica, $nombre, $email, $unidad, $locale);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;
            
            $mail->addAddress($email);
            $pedido->saveCustomerData($optica, $nombre, $email, $unidad, $fecha, $codigo, $origen);


            try {
                // Enviar el correo
                $mail->send();
                return response()->json(['message' => 'Email enviado correctamente.']);
            } catch (Exception $e) {
                // Manejo de errores
                return response()->json(['message' => "No se pudo enviar el email. Error: {$mail->ErrorInfo}"], 500);
            }

            return true;
        } catch (Exception $e) {

            echo "No se pudo enviar el email. Error: {$mail->ErrorInfo}";
        }
    }

}