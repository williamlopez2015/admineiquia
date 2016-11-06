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
            'tiempoadicionalinicio'=>'required|max:12',
            'tiempoadicionalfin'=>'required|max:12',
            'ano'=>'required|max:4',
            'descripcion'=>'max:250'

        ];
    }
}
