<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int    $codigo
 * @property int    $naturalAudio
 * @property string $d1
 * @property string $d2
 * @property string $d3
 * @property string $d4
 * @property string $d5
 * @property string $d6
 * @property string $d7
 * @property string $d8
 * @property string $d9
 * @property string $d10
 * @property string $d11
 * @property string $d12
 * @property string $d13
 * @property string $d14
 * @property string $d15
 * @property string $d16
 * @property string $d17
 * @property string $d18
 * @property string $d19
 * @property string $d20
 * @property string $d21
 * @property string $d22
 * @property string $d23
 * @property string $d24
 * @property string $d25
 * @property string $d26
 * @property string $d27
 * @property string $d28
 * @property string $d29
 * @property string $d30
 * @property string $d31
 * @property string $d32
 * @property string $d33
 * @property string $d34
 * @property string $d35
 * @property string $d36
 * @property string $d37
 * @property string $d38
 * @property string $d39
 * @property string $d40
 * @property string $d41
 * @property string $d42
 * @property string $d43
 * @property string $d44
 * @property string $d45
 * @property string $d46
 * @property string $d47
 * @property string $d48
 * @property string $d49
 * @property string $d50
 * @property string $d51
 * @property string $d52
 * @property string $d53
 * @property string $d54
 * @property string $d55
 * @property string $d56
 * @property string $d57
 * @property string $d58
 * @property string $d59
 * @property string $f1
 * @property string $f2
 * @property string $f3
 * @property string $f4
 * @property string $f5
 * @property string $f6
 * @property string $f7
 * @property string $f8
 * @property string $f9
 * @property string $f10
 * @property string $weblogin
 * @property string $tienda
 * @property string $CRM
 */
class Empresas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empresas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'codigo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8', 'd9', 'd10', 'd11', 'd12', 'd13', 'd14', 'd15', 'd16', 'd17', 'd18', 'd19', 'd20', 'd21', 'd22', 'd23', 'd24', 'd25', 'd26', 'd27', 'd28', 'd29', 'd30', 'd31', 'd32', 'd33', 'd34', 'd35', 'd36', 'd37', 'd38', 'd39', 'd40', 'd41', 'd42', 'd43', 'd44', 'd45', 'd46', 'd47', 'd48', 'd49', 'd50', 'd51', 'd52', 'd53', 'd54', 'd55', 'd56', 'd57', 'd58', 'd59', 'f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8', 'f9', 'f10', 'naturalAudio', 'weblogin', 'tienda', 'CRM'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'int', 'd1' => 'string', 'd2' => 'string', 'd3' => 'string', 'd4' => 'string', 'd5' => 'string', 'd6' => 'string', 'd7' => 'string', 'd8' => 'string', 'd9' => 'string', 'd10' => 'string', 'd11' => 'string', 'd12' => 'string', 'd13' => 'string', 'd14' => 'string', 'd15' => 'string', 'd16' => 'string', 'd17' => 'string', 'd18' => 'string', 'd19' => 'string', 'd20' => 'string', 'd21' => 'string', 'd22' => 'string', 'd23' => 'string', 'd24' => 'string', 'd25' => 'string', 'd26' => 'string', 'd27' => 'string', 'd28' => 'string', 'd29' => 'string', 'd30' => 'string', 'd31' => 'string', 'd32' => 'string', 'd33' => 'string', 'd34' => 'string', 'd35' => 'string', 'd36' => 'string', 'd37' => 'string', 'd38' => 'string', 'd39' => 'string', 'd40' => 'string', 'd41' => 'string', 'd42' => 'string', 'd43' => 'string', 'd44' => 'string', 'd45' => 'string', 'd46' => 'string', 'd47' => 'string', 'd48' => 'string', 'd49' => 'string', 'd50' => 'string', 'd51' => 'string', 'd52' => 'string', 'd53' => 'string', 'd54' => 'string', 'd55' => 'string', 'd56' => 'string', 'd57' => 'string', 'd58' => 'string', 'd59' => 'string', 'f1' => 'string', 'f2' => 'string', 'f3' => 'string', 'f4' => 'string', 'f5' => 'string', 'f6' => 'string', 'f7' => 'string', 'f8' => 'string', 'f9' => 'string', 'f10' => 'string', 'naturalAudio' => 'int', 'weblogin' => 'string', 'tienda' => 'string', 'CRM' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...

    public function __construct()
    {
        $this->getOnlyAllAudios();
    }



    /* 

     ██████╗ ███████╗███╗   ██╗███████╗██████╗  █████╗ ██╗     
    ██╔════╝ ██╔════╝████╗  ██║██╔════╝██╔══██╗██╔══██╗██║     
    ██║  ███╗█████╗  ██╔██╗ ██║█████╗  ██████╔╝███████║██║     
    ██║   ██║██╔══╝  ██║╚██╗██║██╔══╝  ██╔══██╗██╔══██║██║     
    ╚██████╔╝███████╗██║ ╚████║███████╗██║  ██║██║  ██║███████╗
    ╚═════╝ ╚══════╝╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝
                                                            
    */


    //================OBTENER TODAS LAS TIENDAS SEGÚN EL WEBLOGIN================
    public function getStoresByWeblogin($weblogin)
    {

        $datos = DB::table('empresas')
            ->where('weblogin', $weblogin)
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }

    public function getWebloginAll()
    {

        $datos = DB::table('empresas')
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }


    //================OBTENER TIENDA ESPECÍFICA SEGÚN SU WEBLOGIN Y EL NÚMERO DE TIENDA================
    public function getStoresByWebloginAndCode($weblogin, $tienda)
    {

        $datos = DB::table('empresas')
            ->where('weblogin', $weblogin)
            ->where('tienda', $tienda)
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }

    /* 

     ██████╗ ██████╗ ████████╗██╗ ██████╗ █████╗ ███████╗
    ██╔═══██╗██╔══██╗╚══██╔══╝██║██╔════╝██╔══██╗██╔════╝
    ██║   ██║██████╔╝   ██║   ██║██║     ███████║███████╗
    ██║   ██║██╔═══╝    ██║   ██║██║     ██╔══██║╚════██║
    ╚██████╔╝██║        ██║   ██║╚██████╗██║  ██║███████║
    ╚═════╝ ╚═╝        ╚═╝   ╚═╝ ╚═════╝╚═╝  ╚═╝╚══════╝
                                                     
    */


    //================OBTENER LOS DATOS DE TODAS LAS TIENDAS QUE SEAN OPTICAS================
    public function getOnlyAllOpticsByWeblogin($weblogin)
    {

        $datos = DB::table('empresas')
            ->where('weblogin', $weblogin)
            ->where('d29', 'like', '%Optics%')
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }


    //================OBTENER SÓLO LOS DATOS DE LA TIENDA QUE SE PASO================
    public function getStoreOnlyOpticsByWebloginAndCode($weblogin, $tienda)
    {

        $datos = DB::table('empresas')
            ->where('weblogin', $weblogin)
            ->where('tienda', $tienda)
            ->where('d29', 'like', '%Optics%')
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }


    /* 
    
     █████╗ ██╗   ██╗██████╗ ██╗ ██████╗ 
    ██╔══██╗██║   ██║██╔══██╗██║██╔═══██╗
    ███████║██║   ██║██║  ██║██║██║   ██║
    ██╔══██║██║   ██║██║  ██║██║██║   ██║
    ██║  ██║╚██████╔╝██████╔╝██║╚██████╔╝
    ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚═╝ ╚═════╝ 
                              
    */


    protected $codigo; //variable para almacenar los datos de las tiendas que ofrecen el servicio de audiología

    public function getCodeService()
    {
        return $codigo = $this->codigo;
    }

    //================FUNCIÓN PARA FILTRAR TODAS LAS TIENDAS QUE OFREZCAN EL SERVICIO DE AUDIO================
    public function getOnlyAllAudios()
    {

        $datos = DB::table('empresas')
            ->select('codigo', 'd1')
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        // dd($datos);

        $servicios_audios = ['42', '19', '17', '43', '21', '39', '44', '45'];


        $servicios = [];
        $codigo = [];
        foreach ($datos as $dato) {
            $servicios[$dato->codigo] = $dato->d1;
        }


        foreach ($servicios as $key => $dato) {
            $is_audio = false;
            $id_servicios = explode('-', $dato);

            foreach ($id_servicios as $id) {
                if (in_array($id, $servicios_audios)) {
                    $is_audio = true;
                    break;
                }
            }

            if (!$is_audio) {
                unset($servicios[$key]);
            } else {
                $codigo[] = $key; // Agregar la clave $key al arreglo $codigo
            }
        }
        //dd($codigo);
        $this->codigo = $codigo;
    }


    //================OBTENER LOS DATOS DE TODAS LAS TIENDAS QUE SEAN AUDIO================

    public function getStoreAllAudio()
    {

        $codigo = $this->codigo;

        $datos = DB::table('empresas')
            ->whereIn('codigo', $codigo)
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }

    //================OBTENER LOS DATOS DE TODAS LAS TIENDAS QUE SEAN AUDIO PASANDOLE WEBLOGIN================

    public function getStoreByCodeAndWeblogin($weblogin)
    {

        $codigo = $this->codigo;

        $datos = DB::table('empresas')
            ->whereIn('codigo', $codigo)
            ->where('weblogin', $weblogin)
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }


    //================OBTENER LOS DATOS DE LA TIENDA ESPECÍFICA QUE PRESTA EL SERVICIO DE AUDIO================
    public function getStoreOnlyAudioByWebloginAndCode($weblogin, $tienda)
    {

        $codigo = $this->codigo;

        $datos = DB::table('empresas')
            ->whereIn('codigo', $codigo)
            ->where('weblogin', $weblogin)
            ->where('tienda', $tienda)
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }

    //================OBTENER TIENDA POR CÓDIGO PARA ENVÍO EMAIL=================

    public function getStoreByCodestrore($code_store)
    {

        $codigo = $this->codigo;

        $datos = DB::table('empresas')
            ->whereIn('codigo', $codigo)
            ->where('tienda', $code_store)
            ->where('d22', 'si')           // Condición 2: d22 igual a 'si'
            ->where(function ($query) {     // Condición 3: d9 igual a '0' o '1'
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;
    }

    //================OBTENER CIUDAD POR LA TIENDA================

    public function getCityByoptica($optica){

        $datos = DB::table('empresas')
            ->select('d3')
            ->where('codigo', $optica)
            ->where('d22', 'si')           
            ->where(function ($query) {     
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        //dd($datos);
        return $datos;

    }


    /* 
    ██╗      ██████╗  ██████╗  ██████╗ ███████╗
    ██║     ██╔═══██╗██╔════╝ ██╔═══██╗██╔════╝
    ██║     ██║   ██║██║  ███╗██║   ██║███████╗
    ██║     ██║   ██║██║   ██║██║   ██║╚════██║
    ███████╗╚██████╔╝╚██████╔╝╚██████╔╝███████║
    ╚══════╝ ╚═════╝  ╚═════╝  ╚═════╝ ╚══════╝                                         
    */


    public function getLogos($weblogin)
    {
        $codigo = $this->codigo;
        $datos = DB::table("empresas as e")

            ->select("e.f1")
            ->join("direcciones as d", 'd.empresa', '=', 'e.codigo')
            ->whereIn('codigo', $codigo)
            ->where("e.weblogin", $weblogin)
            ->where("e.d22", "=", 'si')
            ->where(function ($query) {
                $query->where('e.d9', '0')
                    ->orWhere('e.d9', '1');
            })
            ->where("e.crm", "=", 'si')
            ->whereNotNull("e.f1")
            ->first();


        /* 
            ->limit(1)
            ->get();
            */
        //dd($datos);

        /* 
        empresa36587553-1.png"
    }
    53 => {#317 ▼
      +"f1": "empresa357322418-1.png"
    }
    54 => {#316 ▼
      +"f1": "empresa367312522-1.png"
    }
    55 => {#315 ▼
      +"f1": ""
    }
    56 => {#314 ▼
      +"f1": "empresa374290130-1.png"
    }
    57 => {#313 ▼
      +"f1": "empresa37446214-1.png"
    }
    58 => {#312 ▼
      +"f1": "empresa37451071-1.png"
        */

        return $datos;
    }


    /* 
     ██████╗██╗██╗   ██╗██████╗  █████╗ ██████╗ ███████╗███████╗
    ██╔════╝██║██║   ██║██╔══██╗██╔══██╗██╔══██╗██╔════╝██╔════╝
    ██║     ██║██║   ██║██║  ██║███████║██║  ██║█████╗  ███████╗
    ██║     ██║██║   ██║██║  ██║██╔══██║██║  ██║██╔══╝  ╚════██║
    ╚██████╗██║╚██████╔╝██████╔╝██║  ██║██████╔╝███████╗███████║
    ╚═════╝╚═╝ ╚═════╝ ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚══════╝╚══════╝
                                                                
    */


    public function getCityByProvincia($codigoProvincia)
    {

        $datos = DB::table("empresas as e")

                ->select('e.d3')
                ->distinct()
                ->join("zonas as z", 'z.id', '=', 'e.d2')
                ->where('z.id', $codigoProvincia)
                ->where("e.d22", "=", 'si')
                ->where(function ($query) {
                    $query->where('e.d9', '0')
                        ->orWhere('e.d9', '1');
                })
                ->where("e.crm", "=", 'si')
                ->orderBy('e.d3', 'asc')
                ->get();

        //dd($datos);
        return $datos;

    }

    public function getStoresByProvincia($localidad){

        $datos = DB::table("empresas")
                ->select('codigo', 'd29', 'd23', 'd3')
                ->where('d3', $localidad)
                ->where("d22", "=", 'si')
                ->where(function ($query) {
                    $query->where('d9', '0')
                        ->orWhere('d9', '1');
                })
                ->where("crm", "=", 'si')
                ->get();
        //dd($datos);
        return $datos;

    }

}
