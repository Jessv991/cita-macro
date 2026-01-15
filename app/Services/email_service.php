<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Empresas;
use App\Models\CitasLandings;
use App\Models\sorteoLc;
use App\Models\practicasNOG;

use Illuminate\Support\Facades\Mail;

class email_service
{

    public function sendEmailOptica($validated, $origen, $test, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $promocional, $landing)
    {

        // echo $weblogin . '<br>';
        // echo $tienda . '<br>';
        // echo $promocional . '<br>';
        // echo $landing . '<br>';

        $tienda = ''; 
        $weblogin = '';

        list($tienda, $weblogin) = explode(' ', $validated['optica'], 2);

        $nombre = $validated['nombre'];
        $apellidos = $validated['apellidos'];
        $email = $validated['email'];
        $movil = $validated['movil'];


        $empresas = new Empresas();
        $mail = new PHPMailer(true);

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


            $optica = $empresas->getStoreByWebloginAndCode($weblogin, $tienda, $promocional, $landing);

            if (!empty($optica) && isset($optica[0])) {

                $tlf_optica = $optica[0]->d6;
                $tienda_codigo = $optica[0]->codigo;
                $email_optica = $optica[0]->d5;
                $direccion_optica = $optica[0]->d23;
                $nombre_optica = $optica[0]->d29;
            } else {
                echo "No se encontró la óptica.";
            }


            if ($promocional === 'true' || $landing === 'contactologia') {
                $mail->Subject = 'Nuevo participante en sorteo: ' . $nombre . ' ' . $apellidos;

                $archivo = resource_path('views/pages/mail/' . $locale . '/templatePromocional.blade.php');
                $palabrasBuscar = array(
                    '{NOMBRECLIENTE}',
                    '{EMAILCLIENTE}',
                    '{TELEFONOCLIENTE}',
                    '{ORIGIN}',
                    '{TELEFONOPTICA}',
                    '{EMAILOPTICO}',
                    '{DIRECIONOPTICA}',
                    '{LOGO}',
                    '{LOCAL}, {LANDING}'
                );


                $palabrasReemplazar = array($nombre . " " . $apellidos, $email, $movil, $origen, $tlf_optica, $email_optica, $direccion_optica, $logoOptica, $locale, $landing);
            } else {
                $mail->Subject = 'Cita previa de ' . $nombre . ' ' . $apellidos;
                $archivo = resource_path('views/pages/mail/' . $locale . '/templateOpticaComprobante.blade.php');
                $palabrasBuscar = array(
                    '{NOMBRECLIENTE}',
                    '{EMAILCLIENTE}',
                    '{TELEFONOCLIENTE}',
                    '{ORIGIN}',
                    '{TELEFONOPTICA}',
                    '{EMAILOPTICO}',
                    '{DIRECIONOPTICA}',
                    '{LOGO}',
                    '{LOCAL}'
                );


                $palabrasReemplazar = array($nombre . " " . $apellidos, $email, $movil, $origen, $tlf_optica, $email_optica, $direccion_optica, $logoOptica, $locale);
            }

            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;


            if ($test == 'true') {
                $mail->addAddress('l.vigna@naturalopticsgroup.com');
                $mail->addCC('j.vasquez@naturalopticsgroup.com');
                $this->sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda_codigo, $origen, $promocional, $landing);
            } else {
                //$mail->addAddress('j.vasquez@naturalopticsgroup.com');
                $mail->addAddress($email_optica);
                $mail->addCC('crm@naturalopticsgroup.com');

                //función que envía email al cliente 
                $this->sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda_codigo, $origen, $promocional, $landing);
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
    }

    function sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda, $origen, $promocional, $landing)
    {
        if ($landing === 'contactologia') {
            $Citas = new sorteoLc();
        } else {
            $Citas = new CitasLandings();
        }

        $mail = new PHPMailer(true);

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


            $mail->setFrom(config('mail.from.address'), $nombre_optica);


            if ($promocional === 'true' || $landing === 'contactologia') {
                $mail->Subject = 'Gracias por participar con ' . $nombre_optica;
                $archivo = resource_path('views/pages/mail/' . $locale . '/templateClientePromocional.blade.php');
                $palabrasBuscar = array(
                    '{DIRECIONOPTICA}',
                    '{TELEFONOPTICA}',
                    '{EMAILOPTICA}',
                    '{NOMBREOPTICA}',
                    '{LOGO}',
                    '{LOCAL}',
                    '{ORIGIN}',
                    '{LANDING}'
                );

                $palabrasReemplazar = array($direccion_optica, $tlf_optica, $email_optica, $nombre_optica, $logoOptica, $locale, $origen, $landing);
            } else {
                $mail->Subject = 'Confirmación de solicitud de cita previa con ' . $nombre_optica;
                $archivo = resource_path('views/pages/mail/' . $locale . '/templateCitaClienteComprobante.blade.php');
                $palabrasBuscar = array(
                    '{DIRECIONOPTICA}',
                    '{TELEFONOPTICA}',
                    '{EMAILOPTICA}',
                    '{NOMBREOPTICA}',
                    '{LOGO}',
                    '{LOCAL}'
                );

                $palabrasReemplazar = array($direccion_optica, $tlf_optica, $email_optica, $nombre_optica, $logoOptica, $locale);
            }


            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;

            $mail->addAddress($email);
            $Citas->saveCustomerData($validated, $url, $tienda, $origen, $tipo_dispositivo, $dispositivo, $ip);


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

    public function sendEmailPracticasOptica($validated, $origen, $test, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $promocional, $landing, $optica1, $optica2, $optica3)
    {
        $Citas = new practicasNOG();
        $mail = new PHPMailer(true);

        $nombre = $validated['nombre'];
        $apellidos = $validated['apellidos'];
        $email = $validated['email'];
        $movil = $validated['movil'];
        $localidad_r = $validated['localidad'];
        $provincia_r = $validated['provincias'];
        $ciudad_r = $validated['ciudad'];

        $opticas = '';

        if (isset($optica3)) {
            $opticas = 'Óptica 1: ' . $optica1 . '<br>' . 'Óptica 2: ' . $optica2 . '<br>' . 'Óptica 3: ' . $optica3;
        } elseif (isset($optica2)) {
            $opticas = 'Óptica 1: ' . $optica1 . '<br>' . 'Óptica 2: ' . $optica2;
        } else {
            $opticas = 'Óptica 1: ' . $optica1;
        }



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


            $mail->setFrom(config('mail.from.address'), 'Practicas NOG');
            $mail->Subject = 'Petición prácticas NOG';

            $archivo = resource_path('views/pages/mail/' . $locale . '/templateEstuaidntePractica.blade.php');
            $palabrasBuscar = array(
                '{NOMBRECLIENTE}',
                '{TELEFONOCLIENTE}',
                '{EMAILCLIENTE}',
                '{LOCALIDAD_R}',
                '{PROVINCIA_R}',
                '{CIUDAD_R}',
                '{OPTICAS_P}',
                '{LOGO}',
                '{LOCAL}',
                '{LANDING}'
            );

            $palabrasReemplazar = array($nombre . ' ' . $apellidos, $movil, $email, $localidad_r, $provincia_r, $ciudad_r, $opticas, $logoOptica, $locale, $landing);


            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;

            $mail->addAddress($email);

            $Citas->saveCustomerData($validated, $origen, $url, $tipo_dispositivo, $dispositivo, $ip, $optica1, $optica2, $optica3);

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
