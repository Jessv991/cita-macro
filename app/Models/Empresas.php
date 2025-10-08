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
        'd1',
        'd2',
        'd3',
        'd4',
        'd5',
        'd6',
        'd7',
        'd8',
        'd9',
        'd10',
        'd11',
        'd12',
        'd13',
        'd14',
        'd15',
        'd16',
        'd17',
        'd18',
        'd19',
        'd20',
        'd21',
        'd22',
        'd23',
        'd24',
        'd25',
        'd26',
        'd27',
        'd28',
        'd29',
        'd30',
        'd31',
        'd32',
        'd33',
        'd34',
        'd35',
        'd36',
        'd37',
        'd38',
        'd39',
        'd40',
        'd41',
        'd42',
        'd43',
        'd44',
        'd45',
        'd46',
        'd47',
        'd48',
        'd49',
        'd50',
        'd51',
        'd52',
        'd53',
        'd54',
        'd55',
        'd56',
        'd57',
        'd58',
        'd59',
        'f1',
        'f2',
        'f3',
        'f4',
        'f5',
        'f6',
        'f7',
        'f8',
        'f9',
        'f10',
        'naturalAudio',
        'weblogin',
        'tienda',
        'CRM'
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
        'codigo' => 'int',
        'd1' => 'string',
        'd2' => 'string',
        'd3' => 'string',
        'd4' => 'string',
        'd5' => 'string',
        'd6' => 'string',
        'd7' => 'string',
        'd8' => 'string',
        'd9' => 'string',
        'd10' => 'string',
        'd11' => 'string',
        'd12' => 'string',
        'd13' => 'string',
        'd14' => 'string',
        'd15' => 'string',
        'd16' => 'string',
        'd17' => 'string',
        'd18' => 'string',
        'd19' => 'string',
        'd20' => 'string',
        'd21' => 'string',
        'd22' => 'string',
        'd23' => 'string',
        'd24' => 'string',
        'd25' => 'string',
        'd26' => 'string',
        'd27' => 'string',
        'd28' => 'string',
        'd29' => 'string',
        'd30' => 'string',
        'd31' => 'string',
        'd32' => 'string',
        'd33' => 'string',
        'd34' => 'string',
        'd35' => 'string',
        'd36' => 'string',
        'd37' => 'string',
        'd38' => 'string',
        'd39' => 'string',
        'd40' => 'string',
        'd41' => 'string',
        'd42' => 'string',
        'd43' => 'string',
        'd44' => 'string',
        'd45' => 'string',
        'd46' => 'string',
        'd47' => 'string',
        'd48' => 'string',
        'd49' => 'string',
        'd50' => 'string',
        'd51' => 'string',
        'd52' => 'string',
        'd53' => 'string',
        'd54' => 'string',
        'd55' => 'string',
        'd56' => 'string',
        'd57' => 'string',
        'd58' => 'string',
        'd59' => 'string',
        'f1' => 'string',
        'f2' => 'string',
        'f3' => 'string',
        'f4' => 'string',
        'f5' => 'string',
        'f6' => 'string',
        'f7' => 'string',
        'f8' => 'string',
        'f9' => 'string',
        'f10' => 'string',
        'naturalAudio' => 'int',
        'weblogin' => 'string',
        'tienda' => 'string',
        'CRM' => 'string'
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


    /* 
    
    ██████╗ ██████╗ ████████╗██╗ ██████╗ █████╗ ███████╗
   ██╔═══██╗██╔══██╗╚══██╔══╝██║██╔════╝██╔══██╗██╔════╝
   ██║   ██║██████╔╝   ██║   ██║██║     ███████║███████╗
   ██║   ██║██╔═══╝    ██║   ██║██║     ██╔══██║╚════██║
   ╚██████╔╝██║        ██║   ██║╚██████╗██║  ██║███████║
    ╚═════╝ ╚═╝        ╚═╝   ╚═╝ ╚═════╝╚═╝  ╚═╝╚══════╝                                                  
    */

    //================OBTENER LOS DATOS DE TODAS LAS TIENDAS================

    public function getStore()
    {

        $datos = DB::table('empresas')
            ->where('d22', 'si')
            ->where('d19', 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        return $datos;
    }

    //================OBTENER LOS DATOS DE TODAS LAS TIENDAS PASANDOLE WEBLOGIN================

    public function getStoreByCodeAndWeblogin($weblogin)
    {

        /* $datos = DB::table('empresas')
            ->where('weblogin', $weblogin)
            ->where('d22', 'si')
            ->where('d19', 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        return $datos; */

        $datos = DB::table('empresas')
            ->where('weblogin', $weblogin)
            ->where('d22', 'si')
            ->where('d19', 'si')
            ->where(function ($query) use ($weblogin) {
                if ($weblogin == 'pruebas') {
                    $query->where(function ($q) {
                        $q->where('d9', '-9');
                    });
                } else {
                    $query->where(function ($q) {
                        $q->where('d9', '0')
                            ->orWhere('d9', '1');
                    });
                }
            })
            ->where('CRM', 'si')
            ->get();

        return $datos;
    }


    //================OBTENER LOS DATOS DE LA TIENDA ESPECÍFICA================
    public function getStoreByWebloginAndCode($weblogin, $tienda)
    {

        $datos = DB::table('empresas')
            ->where('weblogin', $weblogin)
            ->where('tienda', $tienda)
            ->where('d22', 'si')
            ->where('d19', 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        return $datos;
    }

    //================OBTENER TIENDA POR CÓDIGO PARA ENVÍO EMAIL=================

    public function getStoreByCodestrore($code_store)
    {

        $datos = DB::table('empresas')
            ->where('tienda', $code_store)
            ->where('d22', 'si')
            ->where('d19', 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

        return $datos;
    }

    //================OBTENER CIUDAD POR LA TIENDA================

    public function getCityByoptica($optica)
    {

        $datos = DB::table('empresas')
            ->select('d3')
            ->where('codigo', $optica)
            ->where('d22', 'si')
            ->where('d19', 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->get();

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
        $datos = DB::table("empresas as e")

            ->select("e.f1")
            ->join("direcciones as d", 'd.empresa', '=', 'e.codigo')
            ->where("e.weblogin", $weblogin)
            ->where("e.d22", "=", 'si')
            ->where("e.d19", "=", 'si')
            ->where(function ($query) {
                $query->where('e.d9', '0')
                    ->orWhere('e.d9', '1');
            })
            ->where("e.crm", "=", 'si')
            ->whereNotNull("e.f1")
            ->first();


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
            ->distinct('e.d3')
            ->join("zonas as z", 'z.id', '=', 'e.d2')
            ->where('z.id', $codigoProvincia)
            ->where("e.d22", "=", 'si')
            ->where("e.d19", "=", 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where("e.crm", "=", 'si')
            ->orderBy('e.d3', 'asc')
            ->get();

        return $datos;
    }

    public function getStoresByProvincia($localidad, $promocional, $landing)
    {
        $datos = DB::table("empresas")
            ->distinct()
            ->select('tienda', 'd29', 'd23', 'd3', 'weblogin', 'tienda')
            ->where('d3', $localidad)
            ->where("d22", "=", 'si')
            ->where("d19", "=", 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where("crm", "=", 'si')
            ->get();

        return $datos;
    }
}
