<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;
use sisadmineiquia\Http\Requests;
use sisadmineiquia\Empleado;
use sisadmineiquia\Acuerdos;
use Illuminate\Support\Facades\Redirect;
use sisadmineiquia\Http\Requests\AcuerdosFormRequest;
use DB;
use Carbon\Carbon;
use Session;

class AcuerdosController extends Controller
{

    public function __construct(){

    }

    public function index(Request $request){
    	
    	if ($request)
        {
            $query=trim($request->get('searchText'));
            $acuerdos=DB::table('acuerdoadministrat')->where('idacuerdo','LIKE','%'.$query.'%')
            ->orderBy('fechaacuerdo','desc')->paginate();
            //
            return view('admin.acuerdos.index',["acuerdos"=>$acuerdos,"searchText"=>$query]);
            
        }
    }

    public function create(){

    	return view("admin.acuerdos.create");

    }

    public function store(AcuerdosFormRequest $request){
    	
    	$acuerdos=new Acuerdos;
		$acuerdos->idacuerdo=$request->get('idacuerdo');
		$acuerdos->idexpediente=$request->get('idexpediente');
		$acuerdos->motivoacuerdo=$request->get('motivoacuerdo');
		$acuerdos->descripcionacuerdo=$request->get('descripcionacuerdo');
        $acuerdos->estadoacuerdo=$request->get('estadoacuerdo');
    	$acuerdos->fechaacuerdo=$request->get('fechaacuerdo');
    	$acuerdos->save();
    	Session::flash('store','Acuerdo Administrativo creado correctamente!!!');
    	return Redirect::to('admin/acuerdos');

    }

    public function show($id){

    	return view("admin.acuerdos.show",["acuerdos"=>Acuerdos::findOrFail($id)]);

    }

    public function edit($id){

    	return view("admin.acuerdos.edit",["acuerdos"=>Acuerdos::findOrFail($id)]);

    }

    public function update(AcuerdosFormRequest $request, $id){

    	$affectedRows = Acuerdos::where('idacuerdo','=',$id)->update(['motivoacuerdo' => $request->get('motivoacuerdo'),'descripcionacuerdo' =>$request->get('descripcionacuerdo'),'estadoacuerdo' =>$request->get('estadoacuerdo'),'fechaacuerdo' =>$request->get('fechaacuerdo')]);
    	
        Session::flash('update','Acuerdo Administrativo actualizado correctamente!!!');

    	return Redirect::to('admin/acuerdos');

    }

     public function destroy($id)
    {
        $acuerdos=Acuerdos::findOrFail($id);
        $acuerdos->delete();
        return Redirect::to('admin/acuerdos');
    }
}
