<?php

namespace App\Http\Controllers;

use App\Models\CitasLandings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\solicitudes_comerciales;
use App\Models\Zonas;
use App\Services\email_service; //SERVICIO
use App\Services\email_service_comercial; //SERVICIO COMERCIAL
use App\Http\Controllers\imageGenerator; //controller generador de imagen

class view_generator_controller extends Controller
{
    protected $Email_service;
    protected $Email_service_comercial;
    protected $generadorImg;

    public function __construct(Request $request, Email_service_comercial $Email_service_comercial, email_service $Email_service, imageGenerator $generadorImg)
    {
        $this->getTypeDispositive($request);
        $this->Email_service = $Email_service; //SERVICIO QUE SE ENCARGA DE ENVIAR EL EMAIL
        $this->Email_service_comercial = $Email_service_comercial; //SERVICIO COMERCIAL
        $this->generadorImg = $generadorImg; //controller generador de imagen
    }

    protected $data = [];

    public function getTypeDispositive($request)
    {

        /* 
        
        ██████╗ ██╗███████╗██████╗  ██████╗ ███████╗██╗████████╗██╗██╗   ██╗ ██████╗     
        ██╔══██╗██║██╔════╝██╔══██╗██╔═══██╗██╔════╝██║╚══██╔══╝██║██║   ██║██╔═══██╗    
        ██║  ██║██║███████╗██████╔╝██║   ██║███████╗██║   ██║   ██║██║   ██║██║   ██║    
        ██║  ██║██║╚════██║██╔═══╝ ██║   ██║╚════██║██║   ██║   ██║╚██╗ ██╔╝██║   ██║    
        ██████╔╝██║███████║██║     ╚██████╔╝███████║██║   ██║   ██║ ╚████╔╝ ╚██████╔╝    
        ╚═════╝ ╚═╝╚══════╝╚═╝      ╚═════╝ ╚══════╝╚═╝   ╚═╝   ╚═╝  ╚═══╝   ╚═════╝                                                                              
        
        */

        //parametro para detectar vista movil o desktop
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            $tipo_dispositivo = 'mobile';
        } else if (preg_match('/(ipad|tablet|android(?!.*mobile)|kindle)/i', $useragent)) {
            $tipo_dispositivo = isset($_COOKIE['orientacion']) ? $_COOKIE['orientacion'] : 'desktop';
        } else {
            $tipo_dispositivo = 'desktop';
        }
  
        $this->data['tipo_dispositivo'] = $tipo_dispositivo;

        //tipo de dispositivo me da el navegador que se está usando
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

        $weblogin = str_replace(' ', '', $weblogin);

        //================LANDING NOMBRE CARPETA DE LA VISTA=================
        $this->data['landing'] = $origen;

        $origin = request()->has('utm_campaign') ? request()->input('utm_campaign') : $origen;

        $segments = request()->segments();

        $test = request()->query('test'); //(esto está recibiendo test por get)
        $promocional = request()->query('promocional'); //(esto está recibiendo test por get)

        $empresas = new Empresas();
        $zonas = new Zonas();
        $baseUrl = url('/');

        /* 
            ████████╗██╗███████╗███╗   ██╗██████╗  █████╗ ███████╗
            ╚══██╔══╝██║██╔════╝████╗  ██║██╔══██╗██╔══██╗██╔════╝
               ██║   ██║█████╗  ██╔██╗ ██║██║  ██║███████║███████╗
               ██║   ██║██╔══╝  ██║╚██╗██║██║  ██║██╔══██║╚════██║
               ██║   ██║███████╗██║ ╚████║██████╔╝██║  ██║███████║
               ╚═╝   ╚═╝╚══════╝╚═╝  ╚═══╝╚═════╝ ╚═╝  ╚═╝╚══════╝

               consuta para llenar $data con las tiendas que hay
                                                      
        */

        if (isset($weblogin) && isset($tienda)) {
            //consulta cuando pasan weblogin y tienda
            $this->data['centros'] = $empresas->getStoreByWebloginAndCode($weblogin, $tienda, $promocional, $origen);
        } elseif (isset($weblogin)) {
            //consultaslas tiendas por weblogin
            $this->data['centros'] = $empresas->getStoreByCodeAndWeblogin($weblogin, $promocional, $origen);
        } else {
            //consulta todas las tiendas
            $this->data['centros'] = $empresas->getStore($promocional, $origen);
        }

        //=====================IDIOMA==========================
        if(isset($promocional)){

            $this->data['promocional'] = $promocional;
        }else{
            $this->data['promocional'] = false;
        }

        $this->data['idioma'] = $locale;

        //============================GUARDAR RUTA ACTUAL DEL CLIENTE============================
        $this->data['url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        //=====================MAPAS=====================
        
        $this->data['mapa'] = file_get_contents("https://www.plataformasit.com/mapasTiendasNOG/featuresNOG.json");

        //================OPTICA=================
        $this->data['optica'] = $tienda;

        //=====================TEST=====================
        $this->data['test'] = $test;

        //=====================PROVINCIA=====================

        $this->data['weblogin'] = $weblogin;

        $this->data['provincias'] = $zonas->getProvincias($origen);

        //================ORIGEN NOMBRE SEGMENTOS URL====================

        $this->data['origin'] = $origin;

        //=====================RUTAS SEGÚN BASEURL=====================

        if ($baseUrl !== 'https://optica.naturalopticsgroup.com') {

            $rutaAsset = '';

        } else {

            $rutaAsset = 'cita-macro/';

        }

        $this->data['rutaAsset'] = $rutaAsset;

        //=====================IMAGENES=====================

        $imagen = array(
            'cita-macro' => array(
                'revision' => 'assets/img/' . $origen . '/' . $this->data['tipo_dispositivo'] . '/' . $locale . '/revision.png',
                'cumple' => 'assets/img/' . $origen . '/' . $this->data['tipo_dispositivo'] . '/' . $locale . '/cumple.png',
            )
        );

        //clave de las imagenes en el array data
        $this->data['revision'] = $rutaAsset . $imagen['cita-macro']['revision'];
        $this->data['cumple'] = $rutaAsset . $imagen['cita-macro']['cumple'];

        //=====================LOGO=====================

        $logo = $empresas->getLogos($weblogin, $promocional, $origen);

        // Verificar que $logo no sea null antes de pasarlo a la vista
        if($logo){
            $this->data['logo'] = $logo->f1;
        }else {
            $this->data['logo'] = ''; 
        }

        $getLogo = $this->generadorImg->index($this->data['logo']);

        if ($getLogo) {
            $logoOptica = asset($rutaAsset.'/assets/logos/opticas/' . $getLogo);
        }else{
            $logoOptica = null;
        }
        
        $this->data['logoOptica'] = $logoOptica;


        if (view()->exists('pages.' . $origen . '.index')) {//verificamos si la ruta existe
            return view('pages.' . $origen . '.index', ['data' => $this->data]);
        } else {//redirigimos a vista principal si no existe la ruta
            return redirect('https://optica.naturalopticsgroup.com/cita-macro/es/cita-commodity');//ESTO SE DEBE ACTUALIZAR
        }


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
        $promocional = $request->input('promocional');
        $landing = $request->input('landing');
        
        $localidades = $empresas->getCityByProvincia($codigoProvincia, $promocional, $landing);
        
        return response()->json($localidades);
    }
    
    //esta función da las opticas o la optica de la ciudad seleccionada
    public function getOpticasByProvincia(Request $request)
    {
        
        $empresas = new Empresas();
        
        $localidad = $request->input('ciudad');
        $promocional = $request->input('promocional');
        $landing = $request->input('landing');
        
        $optica = $empresas->getStoresByProvincia($localidad, $promocional, $landing);
        
        return response()->json($optica);
    }
    
    
    
    public function getOpticasByWeblogin(Request $request)
    {
        $localidad = $request->input('weblogin');
        $promocional = $request->input('promocional');
        $landing = $request->input('landing');
        
        $empresas = new Empresas();
        
        $optica = $empresas->getStoreByCodeAndWeblogin($localidad, $promocional, $landing);
        
        return response()->json($optica);
    }
    
    
    public function getOpticaByWebloginAndOptica(Request $request)
    {
        
        $localidad = $request->input('weblogin');
        $tienda = $request->input('optica');
        $promocional = $request->input('promocional');
        $landing = $request->input('landing');

        $empresas = new Empresas();

        $optica = $empresas->getStoreByWebloginAndCode($localidad, $tienda, $promocional, $landing);

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



    public function validatePideCita(Request $request)
    {
        $empresas = new Empresas();
        $weblogin = $request->input('_weblogin');
        $locale = $request->input('language');
        $tienda = $request->input('optica');
        $optica1 = null;
        $optica2 = null;
        $optica3 = null;

        $optica = $empresas->getCodigoByWeblogin($weblogin);
        $codigo = $optica[0]->codigo;

        if ($request->has('optica_texto') && !empty($request->input('optica_texto'))) {
            $optica1 = $codigo." - ".$request->input('optica_texto');
        }
        if ($request->has('optica2_texto') && !empty($request->input('optica2_texto')) && $request->input('optica2_texto')!=__('form_translation.optica2')) {
            $optica2 = $codigo." - ".$request->input('optica2_texto');
        }
        if ($request->has('optica3_texto') && !empty($request->input('optica3_texto')) && $request->input('optica3_texto')!=__('form_translation.optica3')) {
            $optica3 = $codigo." - ".$request->input('optica3_texto');
        }
        $origen = $request->input('origen');
        $test = $request->input('_test');
        $logo = $request->input('_logo');
        $tipo_dispositivo = $this->data['tipo_dispositivo'];
        $dispositivo = $this->data['dispositivo'];
        $promocional = $request->input('promocional');
        $landing = $request->input('landing');
        $ip = $this->data['ip'];
        App::setLocale($locale);


        $baseRules = [
            'nombre' => 'bail|required|max:20',
            'apellidos' => 'bail|required|max:20',
            'email' => 'bail|required|email:rfc,dns',
            'movil' => 'bail|required|digits:9|integer',
            'check-poli' => 'accepted',
        ];

        if($origen=='contactologia') {
            $baseRules = [
                'nombre' => 'bail|required|max:20',
                'apellidos' => 'bail|required|max:20',
                'email' => 'bail|required|email:rfc,dns',
                'movil' => 'bail|required|digits:9|integer',
                'check-poli' => 'accepted',
                'check-sorteo' => 'required',
            ];
        }else if ($origen=='practicasNOG') {
            $baseRules = [
                'nombre' => 'bail|required|max:20',
                'localidad' => 'bail|required|max:20',
                'apellidos' => 'bail|required|max:20',
                'email' => 'bail|required|email:rfc,dns',
                'movil' => 'bail|required|digits:9|integer',
                'check-poli' => 'accepted',
                'check-gestion' => 'accepted',
                'provincias' => 'bail|required',
                'ciudad' => 'bail|required',
            ];
        }


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


        if ($getLogo) {

            $logoOptica = asset('cita-macro/assets/logos/opticas/' . $getLogo);
        } else {
            $logoOptica = asset('cita-macro/assets/logos/basicos/audio_white.png');
        }

        if($landing=='practicasNOG'){
            
            $this->Email_service->sendEmailPracticasOptica($validated, $origen, $test, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $promocional, $landing, $optica1, $optica2, $optica3); //SERVICIO QUE SE ENCARGA DE ENVIAR EL EMAIL
        }else{
            $this->Email_service->sendEmailOptica($validated, $origen, $test, $logoOptica, $locale, $url, $tipo_dispositivo, $dispositivo, $ip, $promocional, $landing); //SERVICIO QUE SE ENCARGA DE ENVIAR EL EMAIL
        }


        return response()->json(['message' => 'Formulario validado correctamente.']);
    }

    public function validateKit(Request $request){
        
        $logoOptica = asset('cita-macro/assets/logos/basicos/audio_white.png');
        $origen = $request->input('origen');
        $locale = $request->input('language');
        $test = $request->input('_test');
        App::setLocale($locale);

        /* 
        El formulario cuenta con con estos dos input que estabamos cogiendo sus datos aquí, lo único que se debe hacer
        es declarar las variables que hemos explicado en el gitBook. 
        */

        $telefono_optica = $request->input('telefono_optica');
        $mail_optica = $request->input('mail_optica');

        $validated = $request->validate([
            'optica' => 'bail|required',
            'codigo' => 'bail|required',
            'nombre' => 'bail|required|max:25',
            'email' => 'bail|required|email:rfc,dns',
            'unidad' => 'bail|required',
            'check-poli' => 'accepted',
        ]);

        $this->Email_service_comercial->sendEmailComercial($validated, $test, $locale, $origen, $logoOptica, $telefono_optica, $mail_optica);

        return response()->json(['message' => 'Formulario validado correctamente.']);

    }

}
