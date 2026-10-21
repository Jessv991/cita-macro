<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\solicitudes_comerciales;
use App\Models\sorteoLc;
use App\Models\Empresas;

use Illuminate\Support\Facades\Mail;

class email_ocasional_comercial
{

    public function sendEmailComercial($validated, $premio, $landing, $ip, $locale, $test)
    {

        $nombre = $validated['nombre'] . ' ' . $validated['apellidos'];
        $email_cliente = $validated['email'];
        $movil = $validated['movil'];
        $fecha = date("Y-m-d");

        $mail = new PHPMailer(true);

        try {

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
            $mail->Subject = 'Participación Ilerna Lleida';
            $archivo = resource_path('views/pages/mail/' . $locale . '/ruletaComprobante.blade.php');

            $palabrasBuscar = array(
                '{CONTACTO}',
                '{ORIGIN}',
                '{FECHA}',
                '{EMAILOPTICO}',
                '{LOCAL}'
            );


            $palabrasReemplazar = array($nombre, $landing, $fecha, $email_cliente, $locale);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;


            if ($test == 'true') {
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');
            } else {
                $mail->addAddress('g.vall@naturalopticsgroup.com');
                //$mail->addCC('crm@naturalopticsgroup.com');
                //función que envía email al cliente 
                $this->sendMessageClient($validated['nombre'], $validated['apellidos'], $email_cliente, $locale, $fecha, $landing);
            }


            try {
                // Enviar el correo
                $mail->send();
                return response()->json(['message' => 'Email enviado correctamente.']);
            } catch (Exception $e) {
                // Manejo de errores
                dd('entró', $mail->ErrorInfo);
                return response()->json(['message' => "No se pudo enviar el email. Error: {$mail->ErrorInfo}"], 500);
            }

            return true;
        } catch (Exception $e) {

            echo "No se pudo enviar el email. Error: {$mail->ErrorInfo}";
        }
    }

    function sendMessageClient($nombre, $apellidos, $email_cliente, $locale, $fecha, $origen)
    {

        $participacion = new sorteoLc();
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
            $archivo = resource_path('views/pages/mail/' . $locale . '/ruletaClienteComprobante.blade.php');


            $palabrasBuscar = array(
                '{CONTACTO}',
                '{EMAIL}',
                '{FECHA}',
                '{ORIGIN}',
                '{LOCAL}'
            );

            $palabrasReemplazar = array($nombre . ' ' . $apellidos, $email_cliente, $fecha, $origen, $locale);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;

            $mail->addAddress($email_cliente);
            //$participacion->saveCustomerData($optica, $nombre, $email_cliente, $fechaBD, $origen);

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
