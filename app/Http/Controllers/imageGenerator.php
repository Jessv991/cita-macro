<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imageGenerator extends Controller
{

    public function index($imagen)
    {

        $localDirectory = public_path('assets/logos/opticas/');

        $localImagen = $localDirectory . $imagen;

        // URL de donde se descargarán las imágenes si no están en el directorio local
        $remoteImageUrl = 'https://naturalopticsgroup.com/opticas/fotos/' . $imagen;

        // Verificar si la imagen existe en el directorio local
        if (!file_exists($localImagen)) {

            // Si la imagen no existe localmente, se descarga desde la URL remota
            $imageContent = @file_get_contents($remoteImageUrl);

            file_put_contents($localImagen, $imageContent);
        }


        return $imagen;
    }
}
