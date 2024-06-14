<?php

use App\Http\Controllers\viewGenerator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('{locale}/', function (string $locale) {
    
    if (! in_array($locale, ['en', 'es', 'ca'])) {
        $locale= 'es'; //si el deferente a los del arry, locale cambia su valor a 'es'
    }
 
    App::setLocale($locale);
 
    return app(ViewGenerator::class)->index();
});