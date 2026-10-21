<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\CitasLandings;
use App\Services\email_service_comercial;
use App\Services\email_ocasional_comercial;

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

    public function validarEmailRulet(Request $request)
    {
        $validated = $request->validate([
            'nombre1' => ['required', 'string', 'max:20'],
            'apellidos1' => ['required', 'string', 'max:20'],
            'email1' => ['required', 'email', 'max:255'],
        ]);

        $citaLandings = new CitasLandings();

        $existe = $citaLandings->getCustomerRegistration(
            $validated['email1']
        );

        return response()->json([
            'ok' => $existe,
            'message' => $existe
                ? 'Email validado correctamente.'
                : 'Este email no figura en nuestros registros.',
            'data' => $validated,
        ], 200);
    }

    public function ValidateRuleta(Request $request)
    {
        $sendEmail = new email_ocasional_comercial();
        dd($request->input('premio_obtenido'));

        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:20'],
            'apellidos' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'movil' => ['bail', 'required', 'digits:9', 'integer'],
            'check-poli' => ['accepted'],
            'check-gestion' => ['accepted'],
        ]);

        $sendEmail->sendEmailComercial(
            $validated,
            $request->input('premio_obtenido'),
            $request->input('landing'), 
            $request->input('_ip'),
            $request->input('language'));
    }
}
