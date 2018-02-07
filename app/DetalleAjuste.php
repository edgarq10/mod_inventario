<?php

namespace mod_inventario;

use Illuminate\Database\Eloquent\Model;

class DetalleAjuste extends Model
{
      protected $table='detalle_ajuste';
    protected $primaryKey="id_dellateAjuste";

    public $timestamps=false;
    protected $fillable = [
        'id_ajuste',
        'id_pro',
        'id',
        'cambioStock',
        'tipoMovimiento',
               
    ];
    protected $guarded = [
        
    ];
}
