<?php

namespace mod_inventario;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
     protected $table='personas';
    protected $primaryKey="id_per";

    public $timestamps=false;
    protected $fillable = [
        'cedula_per',
        'nombres_per',
        'fechaNac_per',
        'ciudadNac_per',
        'direccion_per',
        'telefono_per',
        'email_per',
        'estado_per',
        
        
    ];
    protected $guarded = [
        
    ];
}
