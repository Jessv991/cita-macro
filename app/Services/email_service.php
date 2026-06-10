<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Empresas;
use App\Models\CitasLandings;

use Illuminate\Support\Facades\Mail;

class email_service
{
    public function sendEmailOptica($validated, $origen, $test, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $typeLC, $commodityLC, $weblogin, $tienda, $landing)
    {

        if ($typeLC === 'ordinario') {
            list($tienda, $weblogin) = explode(' ', $validated['optica'], 2);
        }

        $nombre = $validated['nombre'];
        $email = $validated['email'] ?? null;

        if ($typeLC === 'ordinario' || $typeLC === 'sms') {
            $apellidos = $validated['apellidos'];
            $movil = $validated['movil'];
        } elseif ($typeLC === 'email') {
            $apellidos = $validated['apellido'] . ' ' . $validated['apellido2'];
            $clicodi = $validated['clicodi'];
            $comentario = $validated['productoHidden'];
            $direccion = $validated['direccion'] . ' ' . $validated['poblacion'] . ' - ' . $validated['prov_cli'] . ' ' . $validated['cp_cli'];
            if (isset($validated['fijo'])) {
                $movil = $validated['movil'] . '/' . $validated['fijo'];
            } else {
                $movil = $validated['movil'];
            }
        }

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
            if ($typeLC === 'email' || $typeLC === 'sms') {
                $mail->Subject = 'Reposición pack LC de ' . $nombre . ' ' . $apellidos;
            } else {
                $mail->Subject = 'Cita previa de ' . $nombre . ' ' . $apellidos;
            }


            $optica = $empresas->getStoreByWebloginAndCode($weblogin, $tienda);

            if (!empty($optica) && isset($optica[0])) {

                $tlf_optica = $optica[0]->d6;
                $tienda_codigo = $optica[0]->codigo;
                $email_optica = $optica[0]->d5;
                $direccion_optica = $optica[0]->d23;
                $nombre_optica = $optica[0]->d29;
            } else {
                echo "No se encontró la óptica.";
            }

            if ($typeLC === 'ordinario' && $commodityLC === null) {

                if ($landing !== 'RAY-BAN') {
                    $archivo = resource_path('views/pages/mail/' . $locale . '/templateOpticaComprobante.blade.php');
                } else {
                    $archivo = resource_path('views/pages/mail/' . $locale . '/templateOpticaComprobanteRayBan.blade.php');
                }

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
            } elseif ($typeLC === 'email') {
                $archivo = resource_path('views/pages/mail/' . $locale . '/ComprobanteOpticaLC.blade.php');

                $opticaName = $optica[0]->d51;

                $palabrasBuscar = array(
                    '{TIENDA}',
                    '{CLIENTE}',
                    '{CLI_CODI}',
                    '{PRODUCTO}',
                    '{NOMBRE}',
                    '{TELEFONOCLIENTE}',
                    '{EMAILCLIENTE}',
                    '{OPTICA}',
                    '{DIREC_OPTICA}',
                    '{ORIGIN}',
                    '{TELEFONOPTICA}',
                    '{EMAILOPTICO}',
                    '{DIRECIONOPTICA}',
                    '{LOGO}',
                    '{LOCAL}'
                );

                $palabrasReemplazar = array($tienda, $nombre . " " . $apellidos, $clicodi, $comentario, $nombre . " " . $apellidos, $movil, $email, $opticaName, $direccion_optica, $origen, $tlf_optica, $email_optica, $direccion_optica, $logoOptica, $locale);
            } elseif (isset($commodityLC)) {
                $archivo = resource_path('views/pages/mail/' . $locale . '/ComprobanteOpticaLCsms.blade.php');

                $opticaName = $optica[0]->d51;

                $palabrasBuscar = array(
                    '{TIENDA}',
                    '{CLIENTE}',
                    '{NOMBRE}',
                    '{TELEFONOCLIENTE}',
                    '{EMAILCLIENTE}',
                    '{OPTICA}',
                    '{DIREC_OPTICA}',
                    '{ORIGIN}',
                    '{TELEFONOPTICA}',
                    '{EMAILOPTICO}',
                    '{DIRECIONOPTICA}',
                    '{LOGO}',
                    '{LOCAL}'
                );

                $palabrasReemplazar = array($tienda, $nombre . " " . $apellidos, $nombre . " " . $apellidos, $movil, $email, $opticaName, $direccion_optica, $origen, $tlf_optica, $email_optica, $direccion_optica, $logoOptica, $locale);
            }

            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;

            $tienda = $optica[0]->codigo;

            if ($test == 'true') {
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');
                //$this->sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda, $origen, $typeLC, $commodityLC);
            } else {
                //$mail->addAddress('j.vasquez@naturalopticsgroup.com');
                $mail->addAddress($email_optica);
                $mail->addCC('crm@naturalopticsgroup.com');

                //función que envía email al cliente
                if(!empty($email)){
                    $this->sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda_codigo, $origen, $typeLC, $commodityLC, $weblogin, $landing);
                }
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

    function sendMessageClient($tlf_optica, $email_optica, $direccion_optica, $email, $nombre_optica, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $validated, $tienda, $origen, $typeLC, $commodityLC, $weblogin, $landing)
    {

        $Citas = new CitasLandings();
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
            if ($typeLC === 'email' || $typeLC === 'sms') {
                $mail->Subject = 'Confirmada su reposición de pack LC con ' . $nombre_optica;
            } else {
                $mail->Subject = 'Confirmación de solicitud de cita previa con ' . $nombre_optica;
            }

            if ($typeLC === 'email' || $typeLC === 'sms' || $commodityLC === 'lc') {
                $archivo = resource_path('views/pages/mail/' . $locale . '/ComprobanteLC.blade.php');
            } elseif ($typeLC === 'ordinario') {

                if ($landing !== 'RAY-BAN') {
                    $archivo = resource_path('views/pages/mail/' . $locale . '/templateCitaClienteComprobante.blade.php');
                } else {
                    $archivo = resource_path('views/pages/mail/' . $locale . '/templateCitaClienteRayBan.blade.php');
                }

            } else {
                return response()->json(['message' => 'Tipo de solicitud no válido.'], 400);
            }

            if ($email_optica === "ribes@naturaloptics.com") {
                $salud = "salud ocular";
            } else {
                $salud = "salud";
            }

            $textLaborale = ' dentro de 5 días laborables';

            if ($weblogin === 'perederibes' && $locale === 'es') {
                $textLaborale = '. Te informamos cuando las recibamos';
            } elseif ($weblogin === 'perederibes' && $locale === 'ca') {
                $textLaborale = ". T'informem quan les rebem";
            } elseif ($locale === 'ca') {
                $textLaborale = " d'aquí a 5 dies laborables";
            }



            $palabrasBuscar = array(
                '{DIRECIONOPTICA}',
                '{TELEFONOPTICA}',
                '{EMAILOPTICA}',
                '{NOMBREOPTICA}',
                '{LOGO}',
                '{LOCAL}',
                '{SALUD}',
                '{LABORALES}'
            );

            $palabrasReemplazar = array($direccion_optica, $tlf_optica, $email_optica, $nombre_optica, $logoOptica, $locale, $salud, $textLaborale);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;

            $mail->addAddress($email);
            $Citas->saveCustomerData($validated, $url, $tienda, $origen, $tipo_dispositivo, $dispositivo, $ip, $typeLC);


            try {
                // Enviar el correo
                $mail->send();

                //dd(response()->json(['message' => 'Email enviado correctamente.']));
                return response()->json(['message' => 'Email enviado correctamente.']);
            } catch (Exception $e) {
                // Manejo de errores
                return response()->json(['message' => "No se pudo enviar el email. Error: {$mail->ErrorInfo}"], 500);
            }

            return true;
        } catch (Exception $e) {

            return response()->json([
                'message' => "No se pudo enviar el email. Error: {$e->getMessage()}"
            ], 500);
        }
    }
}
