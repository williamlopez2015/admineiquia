<?php

namespace sisadmineiquia\Http\Controllers;

use sisadmineiquia\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
use DB;
//para usuario
use sisadmineiquia\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
// Validación de formularios.
use Validator;

// Hash de contraseñas.
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

        public function edit($id)
    {
       return view("auth.edit",["user"=>User::findOrFail($id)]);
    }
        
    public function update(Request $request,$id)
    {

        // Realizamos la validación de datos recibidos del formulario.
        $rules=array(
            'passwordactual'=>'required|min:6',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password',
            );

        // Llamamos a Validator pasándole las reglas de validación.
        $validator=Validator::make($request->all(),$rules);

        // Si falla la validación redireccionamos de nuevo al formulario
        // enviando la variable Input (que contendrá todos los Input recibidos)
        // y la variable errors que contendrá los mensajes de error de validator.
        if ($validator->fails())
        {
            return Redirect::to('home/'.$id.'/edit')
            ->withInput()
            ->withErrors($validator->messages());
        }else{
            if(Hash::check($request->get('passwordactual'), Auth::user()->password)){
                 $affectedRows = User::where('id','=',$id)
                ->update(['password' =>bcrypt($request->get('password'))]);
                Session::flash('update','Su usuario se ha actualizado correctamente!!!');       
                return Redirect::to('home/'.$id.'/edit'); 

            }else{
                Session::flash('update','La contraseña actual no concide con su usuario!!!');
                return Redirect::to('home/'.$id.'/edit'); 
            }

               
            }
    }
}
