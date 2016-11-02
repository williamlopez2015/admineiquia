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
        'codigoasignatura'=>'required|max:6',
        'nombreasignatura'=>'required|max:50',
        'grupoteorico'=>'required|max:2',
        'grupolaboratorio'=>'required|max:2',
        'grupodiscusion'=>'required|max:2',
        'tiempototal'=>'required|max:3',
        'responsabilidadacademica'=>'required|max:50'
        ];
    }

    public function messages() { return [
        'anocarga.required' =>'El año de la carga es obligatoria', 
        'codigoasignatura.required' =>'El codigo de la asignatura es obligatorio',
         'nombreasignatura.required'=>'El nombre de la asignatura es obligatoria',
         'grupoteorico.required'=>'El campo del grupo teorico es obligatorio',
         'grupodiscusion'=>'El campo del grupo de discusion es obligatorio',
         'grupolaboratorio'=>'El campo del grupo de laboratorio es obligatorio',
         'tiempototal'=>'El campo del tiempo total es obligatorio',
         'responsabilidadacademica'=>'El campo de la responsabilidad es obligatorio',
         ]; }
}
