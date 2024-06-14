<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id_cita
 * @property string   $id_axapta
 * @property string   $id_tienda
 * @property string   $tipo_revision
 * @property string   $nombre
 * @property string   $apellidos
 * @property string   $correo_electronico
 * @property string   $telefono
 * @property string   $mensaje
 * @property DateTime $fecha_peticion
 */
class CitasWebnatural extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'citas_webnatural';

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
        'id_axapta', 'id_tienda', 'tipo_revision', 'nombre', 'apellidos', 'correo_electronico', 'telefono', 'mensaje', 'fecha_peticion'
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
        'id_cita' => 'int', 'id_axapta' => 'string', 'id_tienda' => 'string', 'tipo_revision' => 'string', 'nombre' => 'string', 'apellidos' => 'string', 'correo_electronico' => 'string', 'telefono' => 'string', 'mensaje' => 'string', 'fecha_peticion' => 'datetime'
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
