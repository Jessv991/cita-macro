<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int      $id_cita
 * @property int      $id_consulta
 * @property int      $empresa_id
 * @property string   $nombre
 * @property string   $email
 * @property string   $telefono
 * @property string   $tipo_peticion
 * @property string   $comentario
 * @property DateTime $fecha_peticion
 * @property Date     $fecha_cita
 */
class CitasMicroweb extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'citas_microweb';

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
        'id_consulta', 'empresa_id', 'nombre', 'email', 'telefono', 'fecha_peticion', 'fecha_cita', 'hora_cita', 'estado', 'tipo_peticion', 'comentario'
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
        'id_cita' => 'int', 'id_consulta' => 'int', 'empresa_id' => 'int', 'nombre' => 'string', 'email' => 'string', 'telefono' => 'string', 'fecha_peticion' => 'datetime', 'fecha_cita' => 'date', 'tipo_peticion' => 'string', 'comentario' => 'string'
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
}
