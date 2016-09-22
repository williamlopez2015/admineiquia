<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;
use sisadmineiquia\Puesto;
use Illuminate\Support\Facades\Redirect;
use sisadmineiquia\Http\Requests\PuestoFormRequest;
use DB; 

class PuestoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $puestos=DB::table('puesto')->where('nombrepuesto','LIKE','%'.$query.'%')
            ->orderBy('idpuesto','desc')
            ->paginate(8);
            
            return view('admin.puesto.index',["puestos"=>$puestos,"searchText"=>$query]);
        }
    }
 
    public function create()
    {
    	return view("admin.puesto.create");
    }

    public function store(PuestoFormRequest $request)
    {
    	$puesto=new Puesto;
        $puesto->iddepartamento=$request->get('iddepartamento');
        $puesto->nombrepuesto=$request->get('nombrepuesto');
        $puesto->descripcionpuesto=$request->get('descripcionpuesto');
        $puesto->salariopuesto=$request->get('salariopuesto');
        $puesto->save();
        return Redirect::to('admin/puesto');
    }
        
    public function show($id)
    {
    	return view("admin.puesto.show",["puesto"=>Puesto::findOrFail($id)]);
    }
        
    public function edit($id)
    {
    	return view("admin.puesto.edit",["puesto"=>Puesto::findOrFail($id)]);
    }
        
    public function update(PuestoFormRequest $request,$id)
    {
    	$puesto=Puesto::findOrFail($id);
    	$puesto->iddepartamento=$request->get('iddepartamento');
        $puesto->nombrepuesto=$request->get('nombrepuesto');
        $puesto->descripcionpuesto=$request->get('descripcionpuesto');
        $puesto->salariopuesto=$request->get('salariopuesto');
        $puesto->update();
        return Redirect::to('admin/puesto');
    }   

    public function destroy($id)
    {
    	$puesto=Puesto::findOrFail($id);
        $puesto->condicion='0';
        $puesto->update();
        return Redirect::to('admin/puesto');
    }
}