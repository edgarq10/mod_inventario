<?php

namespace mod_inventario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserFormRequest extends FormRequest
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
       
            'edit_name' => 'required|string|max:50',
            'edit_email' => 'required|string|email|max:255',
            'edit_fechaNac' => 'required|date',
            'edit_ciudadNa' => 'required|string',
            'edit_direccion' => 'required|string|max:100|',
            'edit_telefono' => 'required|string|min:7|max:10',
            'edit_tipo' => 'required|string|max:1|',
            'edit_estado' => 'required|string|max:1|',
//            'edit_password' => 'required|string|min:6|',
        ];
    }
}
