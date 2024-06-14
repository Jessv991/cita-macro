<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;


class viewGenerator extends Controller
{
    public function index($origen, $weblogin=null, $tienda=null){

 
        
        echo($origen); 
        echo($weblogin);
        echo($tienda); 
            

        $empresas = new Empresas();

        
 
        return view('user.index', ['users' => $users]);
      

        return view('pages.body.revision_audio');
        
    }
}
