<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class ExperienciaLaboralAcademicaFormRequest extends Request
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
            'idexpedienteacadem'=>'required',
            'nombreinstitucionexplabacad'=>'required|max:50',
            'fechainicioexplabacad'=>'required|max:15',
            'fechafinalizacionexplabacad'=>'required|max:15',
            'descripcionexplab'=>'max:200'
        ];
    }

    public function messages()
    {
        return ['nombreinstitucionexplabacad.required' =>'El campo Nombre Institucion es obligatorio',
                'fechainicioexplabacad.required' =>'El campo Fecha Inicio es obligatorio',
                'fechafinalizacionexplabacad.required' =>'El campo Fecha Fin es obligatorio',
                'descripcionexplab.max'=>'El maximo de letras es 200 en la descriptcion de la experiencia'];
    }
}
