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
        'id_unidMedida ',
        'nombre_pro',
        'descripcion_pro',
        'iva_pro',
        
        'pvp_pro',
        'stock_pro',
        'estado_pro',
        
    ];
    protected $guarded = [
        'costo_pro',
    ];
}
