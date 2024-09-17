<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string   $codigo
 * @property string   $nombre
 * @property string   $puntos
 * @property string   $activo
 * @property string   $aux1
 * @property string   $aux2
 * @property string   $aux3
 * @property string   $aux4
 * @property DateTime $fecha
 */
class Grupos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grupos';

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
        'codigo', 'nombre', 'puntos', 'activo', 'fecha', 'aux1', 'aux2', 'aux3', 'aux4'
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
        'codigo' => 'string', 'nombre' => 'string', 'puntos' => 'string', 'activo' => 'string', 'fecha' => 'datetime', 'aux1' => 'string', 'aux2' => 'string', 'aux3' => 'string', 'aux4' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fecha'
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
