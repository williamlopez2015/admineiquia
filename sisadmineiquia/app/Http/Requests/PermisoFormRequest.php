<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class PermisoFormRequest extends Request
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
            'idexpediente'=>'required',
            'fechasolicitud'=>'required|max:10|min:10',
            'motivopermiso'=>'required|max:250',
            'tiemposolicitadohora'=>'required|numeric|min:0',
            'tiemposolicitadomin'=>'required|numeric|min:0|max:59',
            'gocesueldo'=>'required',
            'estadopermiso'=>'required',
            'fechapermiso'=>'required|max:10|min:10',
            'cargoempleado'=>'max:50' 
        ];
    }
}
