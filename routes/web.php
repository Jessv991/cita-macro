<?php

use App\Http\Controllers\view_generator_controller;
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
Route::get('cita-macro/{locale}/{origen}/{weblogin?}/{tienda?}', function  ($locale, $origen, $weblogin = null, $tienda = null) {


    if (! in_array($locale, ['en', 'es', 'ca'])) {
        $locale= 'es'; //si el deferente a los del arry, locale cambia su valor a 'es'
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


Route::post('cita-macro/postValidate', [view_generator_controller::class, 'store'])->name('validateForm');

/* Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */