<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Empleado;

use sisadmineiquia\Ciclo;

use sisadmineiquia\ExpedienteAdministrativo;

use Illuminate\Support\Facades\Redirect;

use sisadmineiquia\Http\Requests\TiempoAdicionalFormRequest;

use DB;

use Carbon\Carbon;

use Session;

class TiempoAdicionalController extends Controller
{
    //
     public function __construct(){

    } 

    public function index()
    {
        //
    }

    public function create()
    {
     
     $raw = DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto");
     $empleado  = Empleado::select($raw)->get();

     $ciclo=Ciclo::all();
        
    return view("admin.tiempo.create",["empleados"=>$empleado,"ciclos"=>$ciclo]);
    }

   

    public function store(TiempoAdicionalFormRequest $request)
    {
        if ($request)
        {
            $query=trim($request->get('idempleado'));

            $empleado=Empleado::find($query);
            //var_dump($empleado);
            $expadmin  = DB::table('expedienteadminist')->select('idexpediente,idempleado')->where('idempleado','=',$query)->get();
            if ($expadmin){
                $tiempo=new Tiempo;
                dd($expadmin);
                $tiempo->idexpediente=$expadmin;
                $tiempo->idciclo=$request->get('idciclo');
                $tiempo->fechainicio=$request->get('tiempoadicionalinicio');
                $tiempo->fechafin=$request->get('tiempoadicionalfin');
                $tiempo->descripcion=$request->get('descripcion');
                $tiempo->save();
                Session::flash('store','El tiempo adicional fue anexado  correctamente!!!');
                return Redirect::to('admin/tiempo/create');
            }else{
                    Session::flash('store','aun no existe Expediente Administrativo del Empleado!!!');
                    return Redirect::to('admin/tiempo/create');
                }
        }

    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
