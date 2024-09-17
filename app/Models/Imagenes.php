<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $empresa
 * @property int    $orden
 * @property string $url
 * @property string $titulo
 * @property string $descripcion
 * @property string $aux
 */
class Imagenes extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'imagenes';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = '';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa', 'url', 'titulo', 'descripcion', 'aux', 'orden'
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
        'empresa' => 'int', 'url' => 'string', 'titulo' => 'string', 'descripcion' => 'string', 'aux' => 'string', 'orden' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
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
