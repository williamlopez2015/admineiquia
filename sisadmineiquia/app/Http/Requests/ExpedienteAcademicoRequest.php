<?php

namespace sisadmineiquia\Http\Requests;

use sisadmineiquia\Http\Requests\Request;

class ExpedienteAcademicoRequest extends Request
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
        'fechaaperturaexpacad'=>'required|max:10',
        'nombreinstitucion'=>'required|max:50',
        'tituloobtenido'=>'required|max:50',
        //'tituloestudio'=>'required|max:50',
        'direccioninstitucion'=>'max:60',
        'descripcionacademica'=>'max:200',
        'posgrados'=>'max:2000',
        'maestria'=>'required'
        ];
    }

    public function messages() { return [
        'fechaaperturaexpacad.required' =>'La fecha de Apertura es  obligatoria', 
        'nombreinstitucion.required' =>'El campo nombre de institucion es obligatorio', 
        'tituloobtenido.required' =>'El campo titulo obtenido obligatorio',
        'direccioninstitucion.required'=>'El campo direccion de institucion es obligatorio',
        'descripcionacademica.max'=>'El campo descripcion academica tiene un limite de 200 letras',
        'posgrados.max'=>'El campo Postgrados tiene un limite de 2000 letras',
        'maestria.required' =>'El campo Maestria es obligatorio',
         ]; }
}
