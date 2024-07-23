<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class email_service
{
    public function sendEmail($validated, $origen)
    {
        $nombre = $validated['nombre'];
        $apellidos = $validated['apellidos'];
        $email = $validated['email'];
        $movil = $validated['movil'];
        
        // Lógica para enviar el email
        /* Mail::raw("Hola $nombre $apellido, gracias por contactarnos.", function ($message) use ($email) {
            $message->to($email)->subject('Contacto');
        });

        return "Email enviado!"; */
    }
}
