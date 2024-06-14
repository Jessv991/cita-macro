<?php

use App\Http\Controllers\viewGenerator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('{locale}/', function (string $locale) {
    if (! in_array($locale, ['en', 'es', 'ca'])) {
        abort(400);
    }
 
    App::setLocale($locale);
 
    return app(ViewGenerator::class)->index();
});