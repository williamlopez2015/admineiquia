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
        'primernombre'=>'required|max:50|regex:/^[a-z]+$/i',
        'segundonombre'=>'max:50|regex:/^[a-z]+$/i',
        'primerapellido'=>'required|max:50|regex:/^[a-z]+$/i',
        'segundoapellido'=>'max:50|regex:/^[a-z]+$/i',
        'dui'=>'required|max:10|regex:/^\d{8}-\d{1}$/',
        'nit'=>'required|max:17|regex:/^\d{4}-\d{6}-\d{3}-\d{1}$/',
        'isss'=>'required|max:9|regex:/\d/',
        'afp'=>'required|max:12|regex:/\d/',
        ];
    }

    public function messages()
    {
        return [
        'primernombre.required'=>'El Primer Nombre es obligatorio.',
        'primernombre.max'=>'El Primer Nombre sobrepasa los 50 caracteres.',
        'primernombre.regex'=>'El Primer Nombre solo debe contener letras.',
        'primerapellido.required'=>'El Primer Apellido es obligatorio.',
        'primerapellido.max'=>'El Primer Apellido sobrepasa los 50 caracteres.',
        'primerapellido.regex'=>'El Primer Apellido solo debe contener letras.',
        'segundonombre.max'=>'El Segundo Nombre sobrepasa los 50 caracteres.',
        'segundonombre.regex'=>'El Segundo Nombre solo debe contener letras.',
        'segundoapellido.max'=>'El Segundo Apellido sobrepasa los 50 caracteres.',
        'segundoapellido.regex'=>'El Segundo Apellido solo debe contener letras.',
        'dui.required'=>'El DUI es obligatorio.',
        'dui.max'=>'El DUI sobrepasa los 10 caracteres.',
        'dui.regex'=>'Formato del DUI: 00000000-0.',
        'nit.required'=>'El NIT es obligatorio.',
        'nit.max'=>'El NIT sobrepasa los 17 caracteres.',
        'nit.regex'=>'Formato del NIT: 0000-000000-000-0.',
        'isss.required'=>'El ISSS es obligatorio.',
        'isss.max'=>'El ISSS sobrepasa los 9 caracteres.',
        'isss.regex'=>'Formato del ISSS: 000000000.',
        'afp.required'=>'El AFP es obligatorio.',
        'afp.max'=>'El AFP sobrepasa los 12 caracteres.',
        'afp.regex'=>'Formato del AFP: 000000000000.',
        ];
    }
}
