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
            //'cargoempleado'=>'required|max:50' 
        ];
    }

    public function messages()
    {
        return [
            'idexpediente.required'=>'El campo "id expediente" es obligatorio',
            'fechasolicitud.required'=>'El campo "Fecha Solicitud" es obligatorio',
            'motivopermiso.required'=>'El campo "Motivo permiso" debe tener como maximo 250 caracteres',
            'tiemposolicitadohora.required'=>'El campo "tiempo solicitado : Horas" debe ser numerico y maximo 8 ',
            'tiemposolicitadomin.required'=>'El campo "tiempo solicitado : Minutos" debe ser numerico de "0 a 59"',
            'gocesueldo.required'=>'El campo "Goce de Sueldo" es obligatorio',
            'estadopermiso.required'=>'El campo "Estado permiso" es obligatorio',
            'fechapermiso.required'=>'El campo "Fecha Registro" es obligatorio',
           // 'cargoempleado.required'=>'El campo "Cargo empleado" es obligatorio, Seleccione un Empleado'
        ];
    }
}
