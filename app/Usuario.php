<?php

namespace mod_inventario;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='usuarios';
    protected $primaryKey="ID_USU";
    
    public $timestamps=fase;
    protected $fillable = [
        'NOMBRES_USU',
        'DIRECCION_USU',
        'TELEFONO_USU',
        'EMAIL_USU',
        'TIPO_USU'
        
    ];
    protected $guarded = [
        
    ];
}
