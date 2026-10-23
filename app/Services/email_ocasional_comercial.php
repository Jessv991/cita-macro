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

    public function sendEmailComercial($validated, $premio, $landing, $ip, $locale, $test, $dispositivo, $tipo_dispositivo, $url)
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
                '{NOMBRECLIENTE}',
                '{TELEFONOCLIENTE}',
                '{EMAILCLIENTE}',
                '{ORIGIN}',
                '{LOCAL}',
                '{PREMIO}'
            );


            $palabrasReemplazar = array($nombre, $email_cliente, $validated['movil'], $landing, $locale, $premio);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;

            $premioDB = '';

            if ($premio == '50') {
                $premioDB = 'descuento50';
            } elseif ($premio == 'revision' || $premio == 'lentillas') {
                $premioDB = $premio;
            }

            $sorteoLc = new sorteoLc();

            $sorteoLc->restarCantidadMateria($premioDB, 1);


            if ($test == 'true') {
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');
                $this->sendMessageClient($ip, $email_cliente, $locale, $landing, $validated, $premio, $dispositivo, $tipo_dispositivo, $url);
            } else {
                $mail->addAddress('g.vall@naturalopticsgroup.com');
                //$mail->addCC('crm@naturalopticsgroup.com');
                //función que envía email al cliente 
                $this->sendMessageClient($ip, $email_cliente, $locale, $landing, $validated, $premio, $dispositivo, $tipo_dispositivo, $url);
            }


            try {
                // Enviar el correo
                if ($premio !== 'no_premio') {

                    $mail->send();
                }
                return response()->json(['message' => 'Email enviado correctamente.']);
            } catch (Exception $e) {
                // Manejo de errores
                dd('entró servicio', $mail->ErrorInfo);
                return response()->json(['message' => "No se pudo enviar el email. Error: {$mail->ErrorInfo}"], 500);
            }

            return true;
        } catch (Exception $e) {

            echo "No se pudo enviar el email. Error: {$mail->ErrorInfo}";
        }
    }

    function sendMessageClient($ip, $email_cliente, $locale, $origen, $validated, $premio, $dispositivo, $tipo_dispositivo, $url)
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


            $mail->setFrom(config('mail.from.address'), config('Natural Optics'));
            $mail->Subject = 'Aquí tens el resultat de la ruleta 🏀';
            $archivo = resource_path('views/pages/mail/' . $locale . '/ruletaClienteComprobante.blade.php');


            $palabrasBuscar = array(
                '{PREMIO}',
                '{LOCAL}'
            );

            $palabrasReemplazar = array($premio, $locale);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;

            $mail->addAddress($email_cliente);

            $participacion->saveCustomerData($validated, $url, '3712', $origen, $tipo_dispositivo, $dispositivo, $ip);

            try {
                // Enviar el correo
                if ($premio !== 'no_premio') {
                    $mail->send();
                }
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
