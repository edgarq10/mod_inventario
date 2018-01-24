<?php

namespace mod_inventario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'codigo_pro' => 'required|max:8',
            'nombre_pro' => 'required|string|max:50',
            'descripcion_pro' => 'max:150',
            'iva_pro' => 'string|required|max:1',
            'costo_pro' => 'required',
            'pvp_pro' => 'required',
            'estado_pro' => 'required|max:1',
            
     
        ];
    }
}
