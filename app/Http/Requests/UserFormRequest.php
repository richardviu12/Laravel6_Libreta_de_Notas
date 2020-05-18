<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //aquí de acuerdo al tutorial cambiar false por true
    }

    /**
     * Obtenga las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255', 
            'email' => 'required|email|max:255', //regla que sea requerido(obligatorio), del tipo email, maximo 255 caracteres y unico en la tabla usuarios
            'password' => 'min:6|confirmed'
        ];
    }
}
