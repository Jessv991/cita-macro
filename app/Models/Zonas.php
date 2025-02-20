<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int    $id
 * @property string $nombre
 * @property string $a1
 * @property string $a2
 */
class Zonas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zonas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'a1', 'a2'
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
        'id' => 'int', 'nombre' => 'string', 'a1' => 'string', 'a2' => 'string'
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

    ██████╗ ██████╗  ██████╗ ██╗   ██╗██╗███╗   ██╗ ██████╗██╗ █████╗ ███████╗
    ██╔══██╗██╔══██╗██╔═══██╗██║   ██║██║████╗  ██║██╔════╝██║██╔══██╗██╔════╝
    ██████╔╝██████╔╝██║   ██║██║   ██║██║██╔██╗ ██║██║     ██║███████║███████╗
    ██╔═══╝ ██╔══██╗██║   ██║╚██╗ ██╔╝██║██║╚██╗██║██║     ██║██╔══██║╚════██║
    ██║     ██║  ██║╚██████╔╝ ╚████╔╝ ██║██║ ╚████║╚██████╗██║██║  ██║███████║
    ╚═╝     ╚═╝  ╚═╝ ╚═════╝   ╚═══╝  ╚═╝╚═╝  ╚═══╝ ╚═════╝╚═╝╚═╝  ╚═╝╚══════╝
                                                                          
    */
    public function getProvincias()
    {
        $datos = DB::table('zonas as z')
            ->select('z.a1', 'z.id')
            ->distinct()
            ->join('empresas as e', 'e.d2', '=', 'z.id')
            ->where('z.id', '!=', 53)
            ->where('e.d22', 'si')
            ->where('e.d19', 'si')
            ->where(function ($query) {
                $query->where('d9', '0')
                    ->orWhere('d9', '1');
            })
            ->where('CRM', 'si')
            ->orderBy('nombre', 'asc')
            ->get();

        return $datos;
    }

    public function getProvinciasByWeblogin($weblogin, $codigo)
    {
        $datos = DB::table('zonas as z')
            ->select('z.a1', 'z.id')
            ->distinct()
            ->join('empresas as e', 'e.d2', '=', 'z.id')
            ->whereIn('codigo', $codigo)
            ->where('e.weblogin', $weblogin)
            ->where('z.id', '!=', 53)
            ->where('e.d22', 'si')
            ->where('e.d19', 'si')
            ->where(function ($query) {
                $query->where('e.d9', '0')
                    ->orWhere('e.d9', '1');
            })
            ->where('e.CRM', 'si')
            ->get();

        return $datos;
    }
}
