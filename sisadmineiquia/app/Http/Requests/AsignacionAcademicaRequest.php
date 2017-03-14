<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class AsignacionAcademicaRequest extends Request
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
        'anocarga'=>'required|max:10',
        'codigoasignatura'=>'required|max:6|regex:/^[aA-zZ]{3}\d{3}+$/i',
        'nombreasignatura'=>'required|max:50',
        'grupoteorico'=>'max:24',
        'grupolaboratorio'=>'max:24',
        'grupodiscusion'=>'max:24',
        'tiempototal'=>'required|max:150',
        'responsabilidadadministrativa'=>'max:100'
        ];
    }

    public function messages() { return [
        'anocarga.required' =>'El año de la carga es obligatoria', 
        'codigoasignatura.required' =>'El codigo de la asignatura es obligatorio',
         'nombreasignatura.required'=>'El nombre de la asignatura es obligatoria',
         'grupoteorico.max'=>'El campo del grupo teorico max de numeros 24',
         'grupodiscusion.max'=>'El campo del grupo de discusion max de numeros 2',
         'grupolaboratorio.max'=>'El campo del grupo de laboratorio max de numeros 2',
         'tiempototal'=>'El campo del tiempo total es obligatorio',
         'responsabilidadadministrativa.required'=>'El campo de la responsabilidad administrativa es obligatorio',
         ]; }
}
