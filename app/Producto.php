<?php

namespace mod_inventario;

use Illuminate\Database\Eloquent\Model;

   
class Producto extends Model
{
    
    
    protected $table='productos';
    protected $primaryKey="id_pro";

    public $timestamps=false;
    protected $fillable = [
        'codigo_pro',
        'nombre_pro',
        'descripcion_pro',
        'iva_pro',
        'costo_pro',
        'pvp_pro',
        'estado_pro',
        
    ];
    protected $guarded = [
        
    ];
}
