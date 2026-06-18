<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\solicitudes_comerciales;

use Illuminate\Support\Facades\Mail;

class email_service_comercial
{
    public function sendEmailComercial($validated, $test, $locale, $origen, $logoOptica, $telefono_optica, $mail_optica)
    {

        $optica = $validated['optica'];
        $codigo = $validated['codigo'];
        $nombre = $validated['nombre'];
        $email_cliente = $validated['email'];
        $unidad = $validated['unidad'];
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
            $mail->Subject = 'Kit solicitado por ' . $optica;
            $archivo = resource_path('views/pages/mail/' . $locale . '/kitOpticaComprobante.blade.php');

            $palabrasBuscar = array(
                '{NOMBREOPTICA}',
                '{CONTACTO}',
                '{ORIGIN}',
                '{CODIGO}',
                '{UNIDAD}',
                '{FECHA}',
                '{EMAILOPTICO}',
                '{LOGO}',
                '{LOCAL}'
            );


            $palabrasReemplazar = array($optica, $nombre, $origen, $codigo, $unidad, $fecha, $email_cliente, $logoOptica, $locale);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;


            if ($test == 'true') {
                $mail->addAddress('l.vigna@naturalopticsgroup.com');
            } else {
                $mail->addAddress($mail_optica);
                $mail->addCC('crm@naturalopticsgroup.com');
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
            $archivo = resource_path('views/pages/mail/' . $locale . '/kitClienteComprobante.blade.php');


            $palabrasBuscar = array(
                '{NOMBREOPTICA}',
                '{CONTACTO}',
                '{EMAIL}',
                '{CODIGO}',
                '{FECHA}',
                '{UNIDAD}',
                '{ORIGIN}',
                '{TELEFONOPTICA}',
                '{EMAILOPTICA}',
                '{LOGO}',
                '{LOCAL}'
            );

            $palabrasReemplazar = array($optica, $nombre, $email_cliente, $codigo, $fecha, $unidad, $origen, $telefono_optica, $mail_optica, $logoOptica, $locale);
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

    public function sendEmailCooperCode(array $validated, string $locale)
    {


        $weblogin = strtoupper($validated['weblogin']);
        $code_optica = $validated['code_optica'];
        $titleTienda = '';
        $titleCodigo = '';

        if ($locale === 'es') {
            $titleTienda = 'Tiendas';
            $titleCodigo = 'Código Cooper';
        } elseif ($locale === 'ca') {
            $titleTienda = 'Botigues';
            $titleCodigo = 'Codi Cooper';
        } else {
            $titleTienda = 'Stores';
            $titleCodigo = 'Copper Code';
        }


        $rows = '';

        foreach ($code_optica as $tienda => $codigo) {
            $rows .= "
                <tr>
                    <td>{$tienda}</td>
                    <td>{$codigo}</td>
                </tr>";
        }

        $tabla = "
            <table border='1' cellpadding='5' cellspacing='0' width='100%'>
                <thead>
                    <tr>
                        <th colspan='2'>{$weblogin}</th>
                    </tr>
                    <tr>
                        <th>{$titleTienda}</th>
                        <th>{$titleCodigo}</th>
                    </tr>
                </thead>
                <tbody>
                    {$rows}
                </tbody>
            </table>
            ";

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
            $mail->Subject = 'Códigos Cooper del weblogin ' . $weblogin;
            $archivo = resource_path('views/pages/mail/' . $locale . '/templateCooper.blade.php');

            $palabrasBuscar = array(
                '{TABLET}',
                '{LOCAL}'
            );


            $palabrasReemplazar = array($tabla, $locale);
            $actual = file_get_contents($archivo);
            $actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
            $mail->Body = $actual;



            $mail->addAddress('d.hernandez@naturalopticsgroup.com');
            $mail->addCC('g.bernaus@naturalopticsgroup.com');
            $mail->addCC('g.vall@naturalopticsgroup.com');


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
