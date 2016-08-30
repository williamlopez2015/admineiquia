<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class EmpleadoFormRequest extends Request
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
            //
        'PrimerNombre'=>'required|max:50',
        'SegundoNombre'=>'max:50'
        'PrimerApellido'=>'required|max:50',
        'SegundoApellido'=>'max:50',
        'PrimerApellido'=>'required|max:50',
        'Dui'=>'required|max:10',
        'Nit'=>'required|max:20',
        'Isss'=>'required|max:10',
        'Afp'=>'required|max:12',
        'Foto'=>'max:250',
        'Foto'=>'max:1',
        ];
    }
}
