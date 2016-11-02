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
            'fechasolicitud'=>'required|max:10',
            'motivopermiso'=>'required|max:250',
            'tiemposolicitado'=>'required|max:10',
            'gocesueldo'=>'required',
            'estadopermiso'=>'required',
            'fechapermiso'=>'required|max:10',
            'cargodocente'=>'max:25',
            'numerotarjeta'=>'max:6'
        ];
    }
}
