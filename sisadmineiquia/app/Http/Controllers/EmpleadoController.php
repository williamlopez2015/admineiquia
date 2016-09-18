<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Empleado;

use sisadmineiquia\ExpedienteAdministrativo;

use Illuminate\Support\Facades\Redirect;

use sisadmineiquia\Http\Requests\EmpleadoFormRequest;

use DB;

use Carbon\Carbon;


class EmpleadoController extends Controller
{
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
    	return view("admin.empleado.create");
    }

    public function store(EmpleadoFormRequest $request){
    	
    	$empleados=new Empleado;
    	//obtenemos el campo foto definido en el formulario
    	/*$path=$request->get('foto');
    	var_dump($path);*/
    	//obtenemos el nombre de la foto
       	/*$nombre = $path->getClientOriginalName();
    	$name = Carbon::now()->second.$nombre;
		$empleados->foto = $name;
		\Storage::disk('local')->put($name, \File::get($path));*/
		$pnombre=$request->get('primernombre');
		$snombre=$request->get('segundonombre');
		$papellido=$request->get('primerapellido');
		$sapellido=$request->get('segundoapellido');
		$empleados->primernombre=ucfirst($pnombre);
    	$empleados->segundonombre=ucfirst($snombre);
    	$empleados->primerapellido=ucfirst($papellido);
    	$empleados->segundoapellido=ucfirst($sapellido);
    	$empleados->dui=$request->get('dui');
    	$empleados->nit=$request->get('nit');
    	$empleados->isss=$request->get('isss');
    	$empleados->afp=$request->get('afp');
    	$empleados->estado='1';
    	$empleados->save();

    	$p1=ucfirst($papellido);
    	$p2=ucfirst($sapellido);
    	$em = DB::select('select MAX(idempleado) AS id  from empleado');
    	var_dump($em);
    	$ide=$em[0]->id;
    	$expedienteadministrativo=new ExpedienteAdministrativo;
    	$expedienteadministrativo->idexpediente=$p1[0].$p2[0].$ide;
    	$expedienteadministrativo->idempleado=$ide;
    	$expedienteadministrativo->fechaapertura=$request->get('fechaapertura');
    	$expedienteadministrativo->codigocontrato=$request->get('codigocontrato');
    	$expedienteadministrativo->tiempoadicional=$request->get('tiempoadicional');
    	$expedienteadministrativo->tiempointegral=$request->get('tiempointegral');
    	$expedienteadministrativo->descripcionadmin=$request->get('descripcionadmin');
    	$expedienteadministrativo->save();
    	return Redirect::to('admin/empleado');

    }
    public function show($id){
    	return view("admin.empleado.show",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function edit($id){
    	return view("admin.empleado.edit",["empleado"=>Empleado::findOrFail($id)]);
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
    public function destroy($id){
    	$empleados=new Empleado;
    	$empleado=Empleado::find($id);
    	$empleado->estado=0;
    	$empleado->save();
    	return Redirect::to('admin/empleado');
    }

}
