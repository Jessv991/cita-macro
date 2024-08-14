<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudes_comerciales extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'solicitudes_comerciales';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_solicitud';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_empresa', 'codigo_empresa', 'fecha', 'nombre_contacto', 'telefono_contacto', 'seccion', 'convertida', 'email_contacto', 'origen', 'unidades'
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
        'id_solicitud' => 'int', 'nombre_empresa' => 'string', 'codigo_empresa' => 'string', 'fecha' => 'datetime', 'nombre_contacto' => 'string', 'telefono_contacto' => 'string', 'seccion' => 'string', 'convertida' => 'boolean', 'email_contacto' => 'string', 'origen' => 'string', 'unidades' => 'int'
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

    
}
