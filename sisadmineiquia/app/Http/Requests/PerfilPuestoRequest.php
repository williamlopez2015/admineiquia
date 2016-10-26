<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class PerfilPuestoRequest extends Request
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
            'profesion'=>'required|max:250',
            'reporta'=>'required|max:100',
            'sustituto'=>'required|max:150',
            'relaciones'=>'required|max:150',
            'responsabilidades'=>'required',
            'sustituye'=>'required|max:50'
        ];
    }
}
