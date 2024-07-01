<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int      $id_cita
 * @property string   $id_empresa
 * @property string   $nombre_cliente
 * @property string   $apellido1_cliente
 * @property string   $apellido2_cliente
 * @property string   $email_cliente
 * @property string   $telefono_cliente
 * @property string   $origin
 * @property string   $url_cita
 * @property string   $mensaje_comentario
 * @property string   $tipo_peticion
 * @property string   $status
 * @property string   $status_error
 * @property string   $ip
 * @property string   $tipo_dispositivo
 * @property string   $dispositivo
 * @property DateTime $fecha_peticion
 * @property Date     $fecha_cita
 */
class CitasLandings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'citas_landings';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_cita';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_empresa', 'nombre_cliente', 'apellido1_cliente', 'apellido2_cliente', 'email_cliente', 'telefono_cliente', 'fecha_peticion', 'origin', 'url_cita', 'mensaje_comentario', 'tipo_peticion', 'fecha_cita', 'hora_cita', 'status', 'status_error', 'ip', 'tipo_dispositivo', 'dispositivo'
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
        'id_cita' => 'int', 'id_empresa' => 'string', 'nombre_cliente' => 'string', 'apellido1_cliente' => 'string', 'apellido2_cliente' => 'string', 'email_cliente' => 'string', 'telefono_cliente' => 'string', 'fecha_peticion' => 'datetime', 'origin' => 'string', 'url_cita' => 'string', 'mensaje_comentario' => 'string', 'tipo_peticion' => 'string', 'fecha_cita' => 'date', 'status' => 'string', 'status_error' => 'string', 'ip' => 'string', 'tipo_dispositivo' => 'string', 'dispositivo' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_peticion', 'fecha_cita'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...


    public function saveCustomerData($validated, $url, $codigo, $origen, $tipo_dispositivo, $dispositivo, $ip)
    {

        //dd($url);

        $datos = DB::table('CitasLandings')
            ->insert([
                'nombre_cliente' => $validated['nombre'],
                'apellido1_cliente' => $validated['apellidos'],
                'email_cliente' => $validated['email'],
                'telefono_cliente' => $validated['movil'],
                'fecha_peticion' => date("Y-m-d H:i:s"),
                'id_empresa' => $codigo,
                'origin' => $origen,
                'url_cita' => $url,
                'ip' => $ip,
                'tipo_dispositivo' => $tipo_dispositivo,
                'dispositivo' => $dispositivo,
            ]);
    }
}
