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

        $fechaCita = $validated['fecha'] ?? null;
        $horaCita = $validated['hora'] ?? null;
        $motivo = $validated['motivo'] ?? null;


        if (!empty($motivo)) {

            if ($motivo === 'examen_visual') {
                $motivo = 'Examen visual / Eye test';
            } elseif ($motivo === 'gafas') {
                $motivo = 'Gafas / Glasses';
            } elseif ($motivo === 'lentes_contacto') {
                $motivo = 'Lentes de contacto / Contact lenses';
            } elseif ($motivo === 'audiologia') {
                $motivo = 'Audiología / Hearing care';
            } elseif ($motivo === 'otra_consulta') {
                $motivo = 'Otra consulta / Other';
            }
        }


        $empresas = new Empresas();
        $mail = new PHPMailer(true);

        try {

            // SMTP configuration
            if ($weblogin === 'rjavea') {
                $host = 'smtp.office365.com';
                $user = 'recall@seepointopticas.com';
                $pass = 'BldYw_2025#Spnt';
                $port = 587;
            } else {
                $host = config('mail.mailers.smtp.host');
                $user = config('mail.mailers.smtp.username');
                $pass = config('mail.mailers.smtp.password');
                $port = config('mail.mailers.smtp.port');
            }

            $mail->isSMTP();
            $mail->Host = $host;
            $mail->Username = $user;
            $mail->Password = $pass;
            $mail->Port = $port;
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->SMTPAuth = true;
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';


            if ($weblogin === 'rjavea') {
                $mail->setFrom($user, 'Óptica Seepoint');
            } else {
                $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            }


            $optica = $empresas->getStoreByWebloginAndCode($weblogin, $tienda, $promocional, $landing);

            if (!empty($optica) && isset($optica[0])) {

                $tlf_optica = $optica[0]->d6;
                $tienda_codigo = $optica[0]->codigo;
                $email_optica = $optica[0]->d5;
                $web_optica = $optica[0]->d7;
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
                    '{LOCAL}',
                    '{LANDING}'
                );


                $palabrasReemplazar = array($nombre . " " . $apellidos, $email, $movil, $origen, $tlf_optica, $email_optica, $direccion_optica, $logoOptica, $locale, $landing);
            } else {
                $mail->Subject = 'Cita previa de ' . $nombre . ' ' . $apellidos;

                $archivo = resource_path('views/pages/mail/' . $locale . '/templateOpticaComprobante.blade.php');

                if ($landing === 'intervision_expert_two_for_one_godella' || $landing === 'intervision_expert_lentillas') {

                    $archivo = resource_path('views/pages/mail/' . $locale . '/templateOpticaComprobanteGodella.blade.php');
                } else if ($landing === 'cuidamos_de_ti') {
                    $archivo = resource_path('views/pages/mail/' . $locale . '/templateOpticaComprobanteCuidamos_de_ti.blade.php');
                }

                $palabrasReemplazar = [];

                if ($landing === 'cuidamos_de_ti') {
                    $palabrasBuscar = array(
                        '{NOMBRECLIENTE}',
                        '{EMAILCLIENTE}',
                        '{TELEFONOCLIENTE}',
                        '{ORIGIN}',
                        '{TELEFONOPTICA}',
                        '{EMAILOPTICO}',
                        '{DIRECIONOPTICA}',
                        '{LOGO}',
                        '{LOCAL}',
                        '{EMAILOPTICA}',
                        '{WEB}',
                        '{MOTIVO}',
                        '{FECHA}',
                        '{HORA}'
                    );

                    $palabrasReemplazar = array($nombre . " " . $apellidos, $email, $movil, $origen, $tlf_optica, $email_optica, $direccion_optica, $logoOptica, $locale, $email_optica, $web_optica, $motivo, $fechaCita, $horaCita);
                } else {
                    $palabrasBuscar = array(
                        '{NOMBRECLIENTE}',
                        '{EMAILCLIENTE}',
                        '{TELEFONOCLIENTE}',
                        '{ORIGIN}',
                        '{TELEFONOPTICA}',
                        '{EMAILOPTICO}',
                        '{DIRECIONOPTICA}',
                        '{LOGO}',
                        '{LOCAL}',
                        '{EMAILOPTICA}',
                        '{WEB}'
                    );

                    $palabrasReemplazar = array($nombre . " " . $apellidos, $email, $movil, $origen, $tlf_optica, $email_optica, $direccion_optica, $logoOptica, $locale, $email_optica, $web_optica);
                }
            }

            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;


            if ($test == 'true') {
                $mail->addAddress('l.vigna@naturalopticsgroup.com');
                $mail->addCC('j.vasquez@naturalopticsgroup.com');
                $this->sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda_codigo, $origen, $promocional, $landing, $web_optica, $weblogin);
            } else {
                $mail->addAddress($email_optica);
                $mail->addCC('crm@naturalopticsgroup.com');

                //función que envía email al cliente 
                $this->sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda_codigo, $origen, $promocional, $landing, $web_optica, $weblogin);
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

    function sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda, $origen, $promocional, $landing, $web_optica, $weblogin)
    {
        if ($landing === 'contactologia') {
            $Citas = new sorteoLc();
        } else {
            $Citas = new CitasLandings();
        }

        $mail = new PHPMailer(true);

        try {

            // SMTP configuration
            if ($weblogin === 'rjavea') {
                $host = 'smtp.office365.com';
                $user = 'recall@seepointopticas.com';
                $pass = 'BldYw_2025#Spnt';
                $port = 587;
            } else {
                $host = config('mail.mailers.smtp.host');
                $user = config('mail.mailers.smtp.username');
                $pass = config('mail.mailers.smtp.password');
                $port = config('mail.mailers.smtp.port');
            }

            $mail->isSMTP();
            $mail->Host = $host;
            $mail->Username = $user;
            $mail->Password = $pass;
            $mail->Port = $port;
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->SMTPAuth = true;
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';


            if ($weblogin === 'rjavea') {
                $mail->setFrom($user, 'Óptica Seepoint');
            } else {
                $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            }


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

                if ($landing === 'intervision_expert_two_for_one_godella' || $landing === 'intervision_expert_lentillas') {

                    $archivo = resource_path('views/pages/mail/' . $locale . '/templateCitaClienteComprobanteGodella.blade.php');
                }

                $palabrasBuscar = array(
                    '{DIRECIONOPTICA}',
                    '{TELEFONOPTICA}',
                    '{EMAILOPTICA}',
                    '{NOMBREOPTICA}',
                    '{LOGO}',
                    '{LOCAL}',
                    '{WEB}'
                );

                $palabrasReemplazar = array($direccion_optica, $tlf_optica, $email_optica, $nombre_optica, $logoOptica, $locale, $web_optica);
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
