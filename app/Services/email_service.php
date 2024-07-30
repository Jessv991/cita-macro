<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Empresas;

use Illuminate\Support\Facades\Mail;

class email_service
{
    public function sendEmailOptica($validated, $origen, $tienda, $test, $logoOptica)
    {

        //dd($logoOptica);
        $nombre = $validated['nombre'];
        $apellidos = $validated['apellidos'];
        $email = $validated['email'];
        $movil = $validated['movil'];
        $iamgeHeader = public_path('/assets/logos/Natural_Optics_Mail.png');


        $empresas = new Empresas();
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
            $mail->Subject = 'Asunto del correo';
            //dd($mail);

            $archivo = resource_path('views/pages/mail/templateOpticaComprobante.blade.php');

            //dd($archivo);

            $optica = $empresas->getStoreByCodestrore($tienda);

            if (!empty($optica) && isset($optica[0])) {

                $tlf_optica = $optica[0]->d6;
                $email_optica = $optica[0]->d5;
                $direccion_optica = $optica[0]->d23;
                $nombre_optica = $optica[0]->d29;
            } else {
                echo "No se encontró la óptica.";
            }


            $palabrasBuscar = array(
                '{NOMBRECLIENTE}', '{EMAILCLIENTE}', '{TELEFONOCLIENTE}', '{ORIGIN}',
                '{TELEFONOPTICA}', '{EMAILOPTICO}', '{DIRECIONOPTICA}', '{LANDINGIMG}'
            );


            $palabrasReemplazar = array($nombre . " " . $apellidos, $email, $movil, $origen, $tlf_optica, $email_optica, $direccion_optica, $iamgeHeader);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;


            if ($test == 'true') {
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');
            } else {
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');
                //$mail->addAddress($email_optica);
                //$mail->addCC('crm@naturalopticsgroup.com');

                //función que envía email al cliente 
                $this->sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica);
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

    function sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica)
    {

        $mail = new PHPMailer(true);
        $imagenOptica = public_path('assets/logos/audio_white.png');

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

            $archivo = resource_path('views/pages/mail/templateCitaClienteComprobante.blade.php');


            $palabrasBuscar = array(
                '{DIRECIONOPTICA}', '{TELEFONOPTICA}', '{EMAILOPTICA}',
                '{NOMBREOPTICA}', '{IMAGENOPTICA}', '{LOGO}'
            );

            $palabrasReemplazar = array($direccion_optica, $tlf_optica, $email_optica, $nombre_optica, $imagenOptica, $logoOptica);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;
            
            $mail->addAddress($email);
            //dd($mail);


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
