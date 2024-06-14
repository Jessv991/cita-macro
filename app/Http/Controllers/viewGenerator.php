<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewGenerator extends Controller
{
    public function index(){

        return view('pages.body.revision_audio');
        
    }
}
