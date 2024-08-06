<?php

namespace App\Http\Controllers;

use App\Models\CitasLandings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Zonas;
use App\Services\email_service;//SERVICIO
use App\Http\Controllers\imageGenerator;//controller generador de imagen

class view_generator_controller extends Controller
{
    protected $Email_service;
    protected $generadorImg;
    
    public function __construct(Request $request, email_service $Email_service, imageGenerator $generadorImg) {
        $this->getTypeDispositive($request);
        $this->Email_service = $Email_service;//SERVICIO QUE SE ENCARGA DE ENVIAR EL EMAIL
        $this->generadorImg = $generadorImg;//controller generador de imagen
    }

    protected $data = [];

    public function getTypeDispositive($request){

         /* 
        
        ██████╗ ██╗███████╗██████╗  ██████╗ ███████╗██╗████████╗██╗██╗   ██╗ ██████╗     
        ██╔══██╗██║██╔════╝██╔══██╗██╔═══██╗██╔════╝██║╚══██╔══╝██║██║   ██║██╔═══██╗    
        ██║  ██║██║███████╗██████╔╝██║   ██║███████╗██║   ██║   ██║██║   ██║██║   ██║    
        ██║  ██║██║╚════██║██╔═══╝ ██║   ██║╚════██║██║   ██║   ██║╚██╗ ██╔╝██║   ██║    
        ██████╔╝██║███████║██║     ╚██████╔╝███████║██║   ██║   ██║ ╚████╔╝ ╚██████╔╝    
        ╚═════╝ ╚═╝╚══════╝╚═╝      ╚═════╝ ╚══════╝╚═╝   ╚═╝   ╚═╝  ╚═══╝   ╚═════╝                                                                              
        
        */

        //parametro para detectar vita movil o desktop
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            $tipo_dispositivo = 'mobile';
        } else {
            $tipo_dispositivo = 'desktop';
        }


        $this->data['tipo_dispositivo'] = $tipo_dispositivo;



        //tipo de dispositivo me da el navegador
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            $tipo_dispositivo = "phone";
            $dispositivo = $useragent;
        } else {
            $tipo_dispositivo = "desktop";
            $dispositivo = $useragent;
        }
        $this->data['dispositivo'] = $dispositivo;


        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        
        $this->data['ip'] = $ip;

        

    }

    public function index($locale, $origen, $weblogin = null, $tienda = null)
    {
        //hacer test en ruta: ?test=true

        $test = request()->query('test'); //(esto está recibiendo test por get)

        $empresas = new Empresas();
        $zonas = new Zonas();
        $centros_audio = array();

        /* 
            ████████╗██╗███████╗███╗   ██╗██████╗  █████╗ ███████╗
            ╚══██╔══╝██║██╔════╝████╗  ██║██╔══██╗██╔══██╗██╔════╝
               ██║   ██║█████╗  ██╔██╗ ██║██║  ██║███████║███████╗
               ██║   ██║██╔══╝  ██║╚██╗██║██║  ██║██╔══██║╚════██║
               ██║   ██║███████╗██║ ╚████║██████╔╝██║  ██║███████║
               ╚═╝   ╚═╝╚══════╝╚═╝  ╚═══╝╚═════╝ ╚═╝  ╚═╝╚══════╝

               consuta para llenar $data con las tiendas que hay
                                                      
        */

        /* //===============GENERAL==================

        if (isset($weblogin) && isset($tienda)) {
            //obtener tienda específica según weblogin y tienda
            $centros = $empresas->getStoresByWebloginAndCode($weblogin, $tienda);
        } elseif (isset($weblogin)) {
            //consulta sólo las tiendas del weblogin pasado
            $centros = $stores = $empresas->getStoresByWeblogin($weblogin);
        } else {
            //nos arroja todas las tiendas
            $centros = $stores = $empresas->getWebloginAll();
        } */


        //==================AUDIOS==================

        if (isset($weblogin) && isset($tienda)) {
            //consulta la tienda específica que sea audio
            $centros_audio = $empresas->getStoreOnlyAudioByWebloginAndCode($weblogin, $tienda);
        } elseif (isset($weblogin)) {
            //consultas todas las tiendas por weblogin que sean audio
            $centros_audio = $empresas->getStoreByCodeAndWeblogin($weblogin);
        } else {
            //consulta las tiendas de aodio
            $centros_audio = $empresas->getStoreAllAudio();
        }


        /*/==================OPTICAS==================
        //consultas todas las tiendas de la regín que sean opticas
        $empresas->getOnlyAllOpticsByWeblogin($weblogin);

        //consulta la tienda en específico que sea optica y coincida su numero de tienda
        $empresas->getStoreOnlyOpticsByWebloginAndCode($weblogin, $tienda);*/


        //==================aquí conservamos las tiendas que nos devuelve la consulta a la base de datos==================
        //$this->data['centros'] = $centros->toArray();
        //$this->data['centros'] = array_merge($this->data['centros'], $centros_audio->toArray());

        $this->data['centros'] = $centros_audio;

        //=====================IDIOMA==========================
        $this->data['idioma'] = $locale;

        //============================GUARDAR RUTA ACTUAL DEL CLIENTE============================
        $this->data['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        /*/=====================MAPAS=====================
        $data['mapa'] = file_get_contents("https://www.audio.naturaloptics.com/mapa/features.json");
		$data['mapaUgo'] = file_get_contents("https://www.audio.naturaloptics.com/mapa/featuresShamirUgo.json");*/

        //================LANDING NOMBRE CARPETA DE LA VISTA=================
        $this->data['landing'] = $origen;

        //================OPTICA=================
        $this->data['optica'] = $tienda;

        //=====================TEST=====================
        $this->data['test'] = $test;

        //=====================PROVINCIA=====================
        $logo = $empresas->getLogos($weblogin);

        // Verificar que $logo no sea null antes de pasarlo a la vista
        if ($logo) {
            $this->data['logo'] = $logo->f1;
        } else {
            $this->data['logo'] = ''; // O cualquier valor predeterminado
        }

        $this->data['weblogin'] = $weblogin;

        $codigo = $empresas->getCodeService();


        $this->data['provincias'] = $zonas->getProvincias($codigo);

       

        /* 

        ██╗███╗   ███╗ █████╗  ██████╗ ███████╗███╗   ██╗███████╗███████╗
        ██║████╗ ████║██╔══██╗██╔════╝ ██╔════╝████╗  ██║██╔════╝██╔════╝
        ██║██╔████╔██║███████║██║  ███╗█████╗  ██╔██╗ ██║█████╗  ███████╗
        ██║██║╚██╔╝██║██╔══██║██║   ██║██╔══╝  ██║╚██╗██║██╔══╝  ╚════██║
        ██║██║ ╚═╝ ██║██║  ██║╚██████╔╝███████╗██║ ╚████║███████╗███████║
        ╚═╝╚═╝     ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚══════╝╚═╝  ╚═══╝╚══════╝╚══════╝
                                                                  
        */


        //imagenes dependiendo del idioma 

        $baseUrl = url('/');


        $imagen = array(
            'orejas' => 'assets/img/' . $origen . '/' . $this->data['tipo_dispositivo'] . '/' . $locale . '/orejas.png',
            'orejas2' => 'assets/img/' . $origen . '/' . $this->data['tipo_dispositivo'] . '/' . $locale . '/orejas2.png',
            'orejas3' => 'assets/img/' . $origen . '/' . $this->data['tipo_dispositivo'] . '/' . $locale . '/orejas3.png',
        );

        if ($baseUrl === 'https://www.audio.naturaloptics.com') {

            $prefixedImagen = array();

            foreach ($imagen as $key => $path) {
                $prefixedImagen[$key] = 'cita-macro/' . $path;
            }

            $this->data['img'] = $prefixedImagen;

        } else {
            $this->data['img'] = $imagen;
        }



        if (view()->exists('pages.' . $origen . '.index')) {
            return view('pages.' . $origen . '.index', ['data' => $this->data]);
        } else {
            return redirect('https://www.naturaloptics.com/cita-commodity/');
        }
        // Retorno de la vista


    }


    /* 
    ██████╗  ██████╗ ███████╗████████╗     ██████╗██╗██╗   ██╗██████╗  █████╗ ██████╗ 
    ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝    ██╔════╝██║██║   ██║██╔══██╗██╔══██╗██╔══██╗
    ██████╔╝██║   ██║███████╗   ██║       ██║     ██║██║   ██║██║  ██║███████║██║  ██║
    ██╔═══╝ ██║   ██║╚════██║   ██║       ██║     ██║██║   ██║██║  ██║██╔══██║██║  ██║
    ██║     ╚██████╔╝███████║   ██║       ╚██████╗██║╚██████╔╝██████╔╝██║  ██║██████╔╝
    ╚═╝      ╚═════╝ ╚══════╝   ╚═╝        ╚═════╝╚═╝ ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝ 
                                                                                    
    */

    //esta función da la ciudad de la provincia seleccionada
    public function getLocalidadByProvincia(Request $request)
    {
        $empresas = new Empresas();

        $codigoProvincia = $request->input('provincias');

        $localidades = $empresas->getCityByProvincia($codigoProvincia);

        return response()->json($localidades);
    }

    //esta función me da las opticas o la optica de la ciudad seleccionada
    public function getOpticasByProvincia(Request $request)
    {

        $empresas = new Empresas();

        $localidad = $request->input('ciudad');

        $optica = $empresas->getStoresByProvincia($localidad);

        return response()->json($optica);
    }

    

    public function getOpticasByWeblogin(Request $request)
    {
        $localidad = $request->input('weblogin');

        $empresas = new Empresas();

        $optica = $empresas->getStoreByCodeAndWeblogin($localidad);

        return response()->json($optica);
    }


    public function getOpticaByWebloginAndOptica(Request $request)
    {

        $localidad = $request->input('weblogin');
        $tienda = $request->input('optica');
        
        $empresas = new Empresas();
        
        $optica = $empresas->getStoreOnlyAudioByWebloginAndCode($localidad, $tienda);

        return response()->json($optica);
    }


    /* 
    
        ██╗   ██╗ █████╗ ██╗     ██╗██████╗  █████╗ ██████╗  ██████╗ ██████╗     ███████╗ ██████╗ ██████╗ ███╗   ███╗
        ██║   ██║██╔══██╗██║     ██║██╔══██╗██╔══██╗██╔══██╗██╔═══██╗██╔══██╗    ██╔════╝██╔═══██╗██╔══██╗████╗ ████║
        ██║   ██║███████║██║     ██║██║  ██║███████║██║  ██║██║   ██║██████╔╝    █████╗  ██║   ██║██████╔╝██╔████╔██║
        ╚██╗ ██╔╝██╔══██║██║     ██║██║  ██║██╔══██║██║  ██║██║   ██║██╔══██╗    ██╔══╝  ██║   ██║██╔══██╗██║╚██╔╝██║
         ╚████╔╝ ██║  ██║███████╗██║██████╔╝██║  ██║██████╔╝╚██████╔╝██║  ██║    ██║     ╚██████╔╝██║  ██║██║ ╚═╝ ██║
          ╚═══╝  ╚═╝  ╚═╝╚══════╝╚═╝╚═════╝ ╚═╝  ╚═╝╚═════╝  ╚═════╝ ╚═╝  ╚═╝    ╚═╝      ╚═════╝ ╚═╝  ╚═╝╚═╝     ╚═╝
                                                                                                             
                                                                                                                                                                                              
    */



    public function store(Request $request)
    {

        $Citas = new CitasLandings();
        

        $weblogin=$request->input('_weblogin');
        $locale = $request->input('language');
        $tienda = $request->input('optica');
        $origen = $request->input('origen');
        $test = $request->input('_test');
        $logo = $request->input('_logo');
        $tipo_dispositivo = $this->data['tipo_dispositivo'];
        $dispositivo = $this->data['dispositivo'];
        $ip = $this->data['ip'];
        App::setLocale($locale);


        $baseRules = [
            'nombre' => 'bail|required|max:20',
            'apellidos' => 'bail|required|max:20',
            'email' => 'bail|required|email:rfc,dns',
            'movil' => 'bail|required|digits:9|integer',
            'check-poli' => 'accepted',
        ];
        
        if ($weblogin) {
            $specificRules = [
                'optica' => 'bail|required',
            ];
        } else {
            $specificRules = [
                'provincias' => 'bail|required',
                'ciudad' => 'bail|required',
                'optica' => 'bail|required',
            ];
        }
        
        $rules = array_merge($baseRules, $specificRules);
        $validated = $request->validate($rules);        


        
        
        
        $url = $request->input('url_landing');
        
        $getLogo = $this->generadorImg->index($logo);


        if($getLogo){

            $logoOptica = asset('cita-macro/assets/logos/opticas/' . $getLogo);
        }else{
            $logoOptica = asset('cita-macro/assets/logos/basicos/audio_white.png');
        }
        
        $sent = $this->Email_service->sendEmailOptica($validated, $origen, $tienda, $test, $logoOptica, $locale);//SERVICIO QUE SE ENCARGA DE ENVIAR EL EMAIL


        if ($sent) {

            //una vez enviado el email, si se hizo correctamente se guardan los datos del cliente 
            $Citas->saveCustomerData($validated, $url, $tienda, $origen, $tipo_dispositivo, $dispositivo, $ip);

        } else {

            return response()->json(['message' => 'Error en el envío del email.'], 500);
            
        }


        return response()->json(['message' => 'Formulario validado correctamente.']);
    }

    
}
