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
        $fecha = date("Y-m-d");

        $mail = new PHPMailer(true);

        try {

            $mail->CharSet = 'UTF-8';
            /* $mail->SMTPDebug = 3;
            $mail->Debugoutput = 'html'; */
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
                $mail->addAddress($mail_optica);

                //función que envía email al cliente 
                $this->sendMessageClient($optica, $nombre, $email_cliente, $unidad, $locale, $fecha, $codigo, $origen, $logoOptica, $telefono_optica, $mail_optica);
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

    function sendMessageClient($optica, $nombre, $email_cliente, $unidad, $locale, $fecha, $codigo, $origen, $logoOptica, $telefono_optica, $mail_optica)
    {

        $pedido = new solicitudes_comerciales();
        $mail = new PHPMailer(true);
        $fechaBD = date("Y-m-d H:i:s");

        try {

            // SMTP configuration
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->Port = config('mail.mailers.smtp.port');
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->isHTML(true);


            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->Subject = 'Confirmación de su pedido';
            $archivo = resource_path('views/pages/mail/'.$locale.'/kitClienteComprobante.blade.php');


            $palabrasBuscar = array(
                '{NOMBREOPTICA}', '{CONTACTO}', '{EMAIL}', '{CODIGO}', '{FECHA}', 
                '{UNIDAD}', '{ORIGIN}', '{TELEFONOPTICA}', '{EMAILOPTICA}', '{LOGO}'
            );

            $palabrasReemplazar = array($optica, $nombre, $email_cliente, $codigo, $fecha, $unidad, $origen, $telefono_optica, $mail_optica, $logoOptica);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;
            
            $mail->addAddress($email_cliente);
            $pedido->saveCustomerData($optica, $nombre, $email_cliente, $unidad, $fechaBD, $codigo, $origen);


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