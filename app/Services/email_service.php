<?php

namespace App\Services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Empresas;

use Illuminate\Support\Facades\Mail;
use Psy\Readline\Hoa\Console;

class email_service
{
    public function sendEmailOptica($validated, $origen, $tienda, $url, $test)
    {

        $nombre = $validated['nombre'];
        $apellidos = $validated['apellidos'];
        $email = $validated['email'];
        $movil = $validated['movil'];
        $iamgeHeader = $url.'/assets/logos/Natural_Optics_Mail.png';
        $iconFacebook= $url.'/assets/iconos/redes_sociales/facebook.png';
        $iconInstagram= $url.'/assets/iconos/redes_sociales/instagram.png';
        $iconTwitter= $url.'/assets/iconos/redes_sociales/instagram.png';
        $iconBlog= $url.'/assets/iconos/redes_sociales/instagram.png';
        

        $empresas = new Empresas();
        $mail = new PHPMailer(true);

        try {

            // SMTP configuration
            $mail->isSMTP();
            $mail->SMTPDebug = 3; // Para mostrar información detallada
            $mail->Debugoutput = 'html'; // Opcional: para una salida HTML más legible
            $mail->CharSet = 'UTF-8';
            $mail->SMTPAuth = true;
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->Port = config('mail.mailers.smtp.port');
            $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
            $mail->isHTML(true);

            
            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->Subject = 'Asunto del correo';

            $archivo = resource_path('views/pages/mail/index.html');

            //dd($archivo);

            $optica = $empresas->getStoreByCodestrore($tienda);

            if (!empty($optica) && isset($optica[0])) {

                $tlf_optica = $optica[0]->d6;
                $email_optica = $optica[0]->d5;
                $direccion_optica = $optica[0]->d23;

            } else {
                echo "No se encontró la óptica.";
            }


            $palabrasBuscar = array(
                '{NOMBRECLIENTE}', '{EMAILCLIENTE}', '{TELEFONOCLIENTE}', '{ORIGIN}',
                '{TELEFONOPTICA}', '{EMAILOPTICO}', '{DIRECIONOPTICA}', '{LANDINGIMG}', '{FACEBOOK}', '{TWITTER}', '{INSTAGRAM}', '{BLOG}'
            );


            $palabrasReemplazar = array($nombre . " " . $apellidos, $email, $movil, $origen, $tlf_optica, $email_optica, $direccion_optica, $iamgeHeader, $iconFacebook, $iconTwitter, $iconInstagram, $iconBlog);
			$actual = file_get_contents($archivo);
			$actual = str_replace($palabrasBuscar, $palabrasReemplazar, $actual);
			$mail->Body = $actual;
            
            
            if($test == 'true'){
                $mail->addAddress('j.vasquez@naturalopticsgroup.com');
            }else{
                $mail->addAddress('jessikavasquez1991@gmail.com');
                //$mail->addAddress($email_optica);
				$mail->addCC('crm@naturalopticsgroup.com');
            }
            


            try {
                // Enviar el correo
                $mail->send();
                return response()->json(['message' => 'Email enviado correctamente.']);
            } catch (Exception $e) {
                // Manejo de errores
                return response()->json(['message' => "No se pudo enviar el email. Error: {$mail->ErrorInfo}"], 500);
            }

        } catch (Exception $e) {

            echo "No se pudo enviar el email. Error: {$mail->ErrorInfo}";
        }

        //return "Email enviado!"; 
    }
}
