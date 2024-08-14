<?php

use App\Http\Controllers\view_generator_controller;
use App\Http\Controllers\imageGenerator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

/* 

██████╗ ██╗   ██╗████████╗ █████╗     ██╗   ██╗██╗███████╗████████╗ █████╗ 
██╔══██╗██║   ██║╚══██╔══╝██╔══██╗    ██║   ██║██║██╔════╝╚══██╔══╝██╔══██╗
██████╔╝██║   ██║   ██║   ███████║    ██║   ██║██║███████╗   ██║   ███████║
██╔══██╗██║   ██║   ██║   ██╔══██║    ╚██╗ ██╔╝██║╚════██║   ██║   ██╔══██║
██║  ██║╚██████╔╝   ██║   ██║  ██║     ╚████╔╝ ██║███████║   ██║   ██║  ██║
╚═╝  ╚═╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝      ╚═══╝  ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝
                                                                           
*/

//ruta politcas de privacidad
Route::get('cita-macro/politicas-de-privacidad/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'es', 'ca'])) {
        $locale = 'es';
    }
    App::setLocale($locale);
    return view('pages.policy.index');
    
})->name('politicas.privacidad');


//ruta cookies
Route::get('cita-macro/politicas-de-cookies/{locale}', function ($locale) {

    if (!in_array($locale, ['en', 'es', 'ca'])) {
        $locale = 'es';
    }

    App::setLocale($locale);

    return view('pages/cookies/index');
})->name('politicas.cookies');

Route::get('cita-macro/{locale}/{origen}/{weblogin?}/{tienda?}', function ($locale, $origen, $weblogin = null, $tienda = null) {


    if (!in_array($locale, ['en', 'es', 'ca'])) {
        $locale = 'es'; //si el diferente a los del arry, locale cambia su valor a 'es'
    }


    //dd(session());
    App::setLocale($locale);

    return app(view_generator_controller::class)->index($locale, $origen, $weblogin, $tienda);
})->name('vistaLanding');





/* 
██████╗ ██╗   ██╗████████╗ █████╗ ███████╗    ██████╗  ██████╗ ███████╗████████╗    ███████╗ ██████╗ ██████╗ ███╗   ███╗
██╔══██╗██║   ██║╚══██╔══╝██╔══██╗██╔════╝    ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝    ██╔════╝██╔═══██╗██╔══██╗████╗ ████║
██████╔╝██║   ██║   ██║   ███████║███████╗    ██████╔╝██║   ██║███████╗   ██║       █████╗  ██║   ██║██████╔╝██╔████╔██║
██╔══██╗██║   ██║   ██║   ██╔══██║╚════██║    ██╔═══╝ ██║   ██║╚════██║   ██║       ██╔══╝  ██║   ██║██╔══██╗██║╚██╔╝██║
██║  ██║╚██████╔╝   ██║   ██║  ██║███████║    ██║     ╚██████╔╝███████║   ██║       ██║     ╚██████╔╝██║  ██║██║ ╚═╝ ██║
╚═╝  ╚═╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝╚══════╝    ╚═╝      ╚═════╝ ╚══════╝   ╚═╝       ╚═╝      ╚═════╝ ╚═╝  ╚═╝╚═╝     ╚═╝
                                                                                                                        
*/


//===============================POST CIUDAD===============================
Route::post('cita-macro/get-localidad-by-provincia', [view_generator_controller::class, 'getLocalidadByProvincia'])->name('getLocalidadByProvincia');

//===============================POST TIENDA===============================
Route::post('cita-macro/get-store-by-provincia', [view_generator_controller::class, 'getOpticasByProvincia'])->name('getOpticasByProvincia');

//===============================POST PASANDO WEBLOGIN===============================
Route::post('cita-macro/get-store-by-weblogin', [view_generator_controller::class, 'getOpticasByWeblogin'])->name('getOpticasByWeblogin');

//===============================POST PASANDO WEBLOGIN Y TIENDA===============================
Route::post('cita-macro/get-store-by-webloginYoptica', [view_generator_controller::class, 'getOpticaByWebloginAndOptica'])->name('getOpticaByWebloginAndOptica');


Route::post('cita-macro/postValidate', [view_generator_controller::class, 'store'])->name('validateForm');

Route::post('cita-macro/postValidateKit', [view_generator_controller::class, 'validateKit'])->name('validateFormKit');

//===============================POST GENERADOR DE IMAGENES===============================
Route::post('cita-macro/imageGenerator', [imageGenerator::class, 'index'])->name('imageGenerator');
/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */