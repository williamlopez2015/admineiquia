<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class AcuerdosFormRequest extends Request
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
        'idacuerdo'=>'required|max:10',
        'idexpediente'=>'required|max:6',
        'motivoacuerdo'=>'required|max:50',
        'descripcionacuerdo'=>'required|max:250',
        'estadoacuerdo'=>'required|max:10',
        'fechaacuerdo'=>'required|max:10',
        ];
    }
}
