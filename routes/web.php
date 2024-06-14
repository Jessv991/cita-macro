<?php

use App\Http\Controllers\viewGenerator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('{locale}/{origen}/{weblogin?}/{tienda?}', function  ($locale, $origen, $weblogin = null, $tienda = null) {


    if (! in_array($locale, ['en', 'es', 'ca'])) {
        $locale= 'es'; //si el deferente a los del arry, locale cambia su valor a 'es'
    }
    App::setLocale($locale);

    return app(ViewGenerator::class)->index($origen, $weblogin, $tienda);
    
});