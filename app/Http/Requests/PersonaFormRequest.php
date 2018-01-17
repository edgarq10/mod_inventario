<?php

namespace mod_inventario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nombre_per' => 'required|string|max:100',
            'fechaNac_per' => 'string|max:150',
            'ciudadNac_per' => 'string|max:150',
            'direccion_per' => 'string|max:150',
            'telefono_per' => 'string|max:10',
            'email_per' => 'string|email|max:50ss',
            'estado_per' => 'required|max:1',
            'rol_per' => 'required|max:1',
        ];
    }

}
