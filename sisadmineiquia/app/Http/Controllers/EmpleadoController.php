<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Empleado;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Requests\EmpleadoFormRequest;

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

    public function store(){
    	$empleados=new Empleado;
    	$empleados->primernombre=$request->get('primernombre');
    	$empleados->segundonombre=$request->get('segundonombre');
    	$empleados->primerapellido=$request->get('primerapellido');
    	$empleados->segundoapellido=$request->get('segundoapellido');
    	$empleados->dui=$request->get('dui');
    	$empleados->nit=$request->get('nit');
    	$empleados->isss=$request->get('isss');
    	$empleados->afp=$request->get('afp');
    	$empleados->foto=$request->get('foto');
    	$empleados->save();
    	return Redirect::to(admin/empleado);

    }
    public function show($id){
    	return view("admin.empleado.show",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function edit($id){
    	return view("admin.empleado.edit",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function update(EmpleadoFormRequest $request,$id){
    	$empleado=Empleado::findOrFail($id);
    	$empleado->primernombre=$request->get('primernombre');
    	$empleado->segundonombre=$request->get('segundonombre');
    	$empleado->primerapellido=$request->get('primerapellido');
    	$empleado->segundoapellido=$request->get('segundoapellido');
    	$empleado->dui=$request->get('dui');
    	$empleado->nit=$request->get('nit');
    	$empleado->isss=$request->get('isss');
    	$empleado->afp=$request->get('afp');
    	$empleado->foto=$request->get('foto');
    	$empleado->update();
    	return Redirect::to(admin/empleado);
    }
    public function destroy($id){
    	$empleado=Empleado::findOrFail($id);
    	$empleado->estado='0';
    	$empleado->update();
    	return Redirect::to(admin/empleado);
    }

}
