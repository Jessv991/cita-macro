<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;

class FormValidator extends Controller
{
    public function validateCooper(Request $request)
    {
        $validated = $request->validate([
            'group' => 'bail|required',
            'weblogin' => 'bail|required',
            'code_optica' => 'bail|required|max:25',
        ]);

        //$this->Email_service_comercial->sendEmailComercial($validated, $test, $locale, $origen, $logoOptica, $telefono_optica, $mail_optica);

        return response()->json(['message' => 'Formulario validado correctamente.']);
    }

    public function getWeblogin(Request $request)
    {
        $empresas = new Empresas();

        $grupo = $request->input('grupo');

        $weblogin = $empresas->getWeblogin($grupo);

        return response()->json($weblogin);
    }
}
