<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Services\email_service_comercial;

class FormValidator extends Controller
{
    public function validateCooper(Request $request)
    {
        $sendEmail = new email_service_comercial();
        $locale = $request->input('language');
        $validated = $request->validate([
            'tipo_comercial' => 'bail|required|in:comercial_nog,comercial_cooper',
            'comercial' => 'bail|required',
            'group' => 'bail|required',
            'weblogin' => 'bail|required',
            'code_optica' => 'bail|required|array',
            'code_optica.*' => 'bail|required|string|regex:/^[0-9]{9}$/',
        ]);

        $sendEmail->sendEmailCooperCode($validated, $locale);

        return response()->json(['message' => 'Formulario validado correctamente.']);
    }

    public function getWeblogin(Request $request)
    {
        $empresas = new Empresas();

        $grupo = $request->input('grupo');

        $weblogin = $empresas->getWeblogin($grupo);

        return response()->json($weblogin);
    }

    public function getStoreByWeblogin(Request $request)
    {
        $empresas = new Empresas();

        $weblogin = $request->input('weblogin');

        $tiendas = $empresas->getStoresByWeblogin($weblogin);

        return response()->json($tiendas);
    }
}
