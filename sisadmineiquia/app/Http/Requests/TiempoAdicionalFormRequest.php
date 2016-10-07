<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class TiempoAdicionalFormRequest extends Request
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
            'idempleado'=>'required',
            'idciclo'=>'required|max:2',
            'tiempoadicionalinicio'=>'max:10',
            'tiempoadicionfin'=>'max:10',
            'descripcionpuesto'=>'max:250',
        ];
    }
}
