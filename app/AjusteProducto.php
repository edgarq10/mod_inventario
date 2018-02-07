<?php

namespace mod_inventario;

use Illuminate\Database\Eloquent\Model;

class AjusteProducto extends Model
{
     protected $table='ajustes';
    protected $primaryKey="id_juste";

    public $timestamps=false;
    protected $fillable = [
        'numero_ajuste',
        'motivo_ajuste',
        'fecha_ajuste',
        'estado_impesion',
               
    ];
    protected $guarded = [
        
    ];
}
