<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id
 * @property int      $tiecodigo
 * @property string   $nombre_cliente
 * @property string   $apellido1_cliente
 * @property string   $apellido2_cliente
 * @property string   $email_cliente
 * @property string   $telefono_cliente
 * @property string   $tipo_comunicacion
 * @property string   $ip
 * @property string   $url
 * @property string   $weblogin
 * @property string   $status
 * @property string   $status_error
 * @property DateTime $fecha_peticion
 */
class BajasCrm extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bajas_crm';

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
        'nombre_cliente', 'apellido1_cliente', 'apellido2_cliente', 'email_cliente', 'telefono_cliente', 'fecha_peticion', 'tipo_comunicacion', 'ip', 'url', 'weblogin', 'tiecodigo', 'status', 'status_error'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int', 'nombre_cliente' => 'string', 'apellido1_cliente' => 'string', 'apellido2_cliente' => 'string', 'email_cliente' => 'string', 'telefono_cliente' => 'string', 'fecha_peticion' => 'datetime', 'tipo_comunicacion' => 'string', 'ip' => 'string', 'url' => 'string', 'weblogin' => 'string', 'tiecodigo' => 'int', 'status' => 'string', 'status_error' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha_peticion'
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
}
