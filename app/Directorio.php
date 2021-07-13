<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $table = 'directorios';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'foto'
    ];

    // campos que queremos ocultar 
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
