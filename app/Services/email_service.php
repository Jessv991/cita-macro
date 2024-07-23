<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class email_service
{
    public function sendEmail($nombre, $apellido, $email, $telefono, $origen)
    {
        // Lógica para enviar el email
        Mail::raw("Hola $nombre $apellido, gracias por contactarnos.", function ($message) use ($email) {
            $message->to($email)->subject('Contacto');
        });

        return "Email enviado!";
    }
}
