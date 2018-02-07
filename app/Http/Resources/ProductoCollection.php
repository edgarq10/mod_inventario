<?php

namespace mod_inventario\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
            'codigo_pro' => $this->codigo_pro,
            'nombre_pro' => $this->nombre_pro,
            'stock_pro' => $this->stock_pro,
           
        ];
    }
}
