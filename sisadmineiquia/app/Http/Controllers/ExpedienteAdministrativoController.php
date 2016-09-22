<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Empleado;

use sisadmineiquia\ExpedienteAdministrativo;

use sisadmineiquia\Puesto;

use Illuminate\Support\Facades\Redirect;

use sisadmineiquia\Http\Requests\EmpleadoFormRequest;

use DB;

use Carbon\Carbon;

class ExpedienteAdministrativoController extends Controller
{
    //
     //
    public function __construct(){

    }

    

    public function index(Request $request){
    	
    	if ($request)
        {
            $query=trim($request->get('searchText'));
            $empleados=DB::table('empleado')->where('primernombre','LIKE','%'.$query.'%')
            ->orderBy('estado','desc')->paginate();
            //
            return view('admin.empleado.index',["empleados"=>$empleados,"searchText"=>$query]);
            
        }
    }

    public function create(){
    	//$empleado = Empleado::lists('primernombre','idempleado');
    	$empleado  = DB::table('empleado')->select('idempleado','primernombre')->get();
    	$puesto = DB::table('puesto')->select('idpuesto','nombrepuesto')->get();
    	//return view("admin.expedienteadministrativo.create",["empleados"=>$empleado,"puestos"=>$puesto]);
    	return view("admin.expedienteadministrativo.create",["empleados"=>$empleado,"puestos"=>$puesto]);
    }

    public function store(Request $request){
    	
    	
    	if ($request)
        {
            $query=trim($request->get('idempleado'));
            $empleado=Empleado::find($query);
	        var_dump($empleado);
	    	$p1=ucfirst($empleado->PRIMERAPELLIDO);
	    	$p2=ucfirst($empleado->SEGUNDOAPELLIDO);
	    	$expedienteadministrativo=new ExpedienteAdministrativo;
	    	$expedienteadministrativo->idexpediente=$p1[0].$p2[0].$request->get('idempleado');
	    	$expedienteadministrativo->idempleado=$request->get('idempleado');
	    	$expedienteadministrativo->idpuesto=$request->get('idpuesto');
	    	$expedienteadministrativo->fechaapertura=$request->get('fechaapertura');
	    	$expedienteadministrativo->codigocontrato=$request->get('codigocontrato');
	    	$expedienteadministrativo->tiempoadicional=$request->get('tiempoadicional');
	    	$expedienteadministrativo->tiempointegral=$request->get('tiempointegral');
	    	$expedienteadministrativo->descripcionadmin=$request->get('descripcionadmin');
	    	$expedienteadministrativo->save();
	    	return Redirect::to('admin/empleado');
   		}

    }
    public function show($id){
    	return view("admin.empleado.show",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function edit($id){
    	return view("admin/expedienteadministrativo.edit",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function update(EmpleadoFormRequest $request, $id){
    	$empleados=Empleado::find($id);
    	//$empleados->foto=$request->get('foto');
    	$empleados->primernombre=$request->get('primernombre');
    	$empleados->segundonombre=$request->get('segundonombre');
    	$empleados->primerapellido=$request->get('primerapellido');
    	$empleados->segundoapellido=$request->get('segundoapellido');
    	$empleados->dui=$request->get('dui');
    	$empleados->nit=$request->get('nit');
    	$empleados->isss=$request->get('isss');
    	$empleados->afp=$request->get('afp');
    	$empleados->estado=$request->get('estado');
    	$empleados->save();
    	return Redirect::to('admin/empleado');
    }
}
