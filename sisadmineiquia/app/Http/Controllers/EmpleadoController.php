<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Empleado;

use Illuminate\Support\Facades\Redirect;

use sisadmineiquia\Http\Requests\EmpleadoFormRequest;

use DB;


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
            ->orderBy('estado','desc')
            ->paginate(7);
            //
            return view('admin.empleado.index',["empleados"=>$empleados,"searchText"=>$query]);
            
        }
    }

    public function create(){
    	return view("admin.empleado.create");
    }

    public function store(EmpleadoFormRequest $request){
    	$empleados=new Empleado;
    	$empleados->foto=$request->get('foto');
    	$empleados->primernombre=$request->get('primernombre');
    	$empleados->segundonombre=$request->get('segundonombre');
    	$empleados->primerapellido=$request->get('primerapellido');
    	$empleados->segundoapellido=$request->get('segundoapellido');
    	$empleados->dui=$request->get('dui');
    	$empleados->nit=$request->get('nit');
    	$empleados->isss=$request->get('isss');
    	$empleados->afp=$request->get('afp');
    	$empleados->estado='1';
    	
    	$empleados->save();
    	return Redirect::to('admin/empleado');

    }
    public function show($id){
    	return view("admin.empleado.show",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function edit($id){
    	return view("admin.empleado.edit",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function update(EmpleadoFormRequest $request, $id){
    	$empleado=Empleado::findOrFail($id);
    	$empleados->foto=$request->get('foto');
    	$empleados->primernombre=$request->get('primernombre');
    	$empleados->segundonombre=$request->get('segundonombre');
    	$empleados->primerapellido=$request->get('primerapellido');
    	$empleados->segundoapellido=$request->get('segundoapellido');
    	$empleados->dui=$request->get('dui');
    	$empleados->nit=$request->get('nit');
    	$empleados->isss=$request->get('isss');
    	$empleados->afp=$request->get('afp');
    	$empleado->estado=$request->get('estado');
    	$empleado->update();
    	return Redirect::to('admin/empleado');
    }
    public function destroy($id){
    	$empleado=Empleado::findOrFail($id);
    	$empleado->estado='0';
    	$empleado->update();
    	return Redirect::to('admin/empleado');
    }

}
