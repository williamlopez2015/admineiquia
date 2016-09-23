<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;
use sisadmineiquia\Puesto;
use Illuminate\Support\Facades\Redirect;
use sisadmineiquia\Http\Requests\PuestoFormRequest;
use Carbon\Carbon;
use Session;
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
            $puestos=DB::table('puesto as p')
            ->join('departamento as d','p.iddepartamento','=','d.iddepartamento')
            ->select('p.idpuesto','p.nombrepuesto','p.descripcionpuesto','p.salariopuesto','d.nombredepartamento as departamento')
            ->where('nombrepuesto','LIKE','%'.$query.'%')
            ->orderBy('idpuesto','desc')
<<<<<<< HEAD
            ->paginate();
=======
            ->paginate(5);
>>>>>>> origin/wen
            
            return view('admin.puesto.index',["puestos"=>$puestos,"searchText"=>$query]);
        }
    }
 
    public function create()
    {
        $departamentos=DB::table('departamento as d')
        ->select('d.iddepartamento','d.nombredepartamento')->get();
        
    	return view("admin.puesto.create",["departamentos"=>$departamentos]);
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

        //$puesto=DB::table('puesto as p')
        //->select('p.idpuesto','p.nombrepuesto','p.descripcionpuesto','p.salariopuesto')
        //->where('p.idpuesto','=','8');
        //$puesto=Puesto::findOrFail($id);
        $departamentos=DB::table('departamento as d')
        ->select('d.iddepartamento','d.nombredepartamento')->get();

    	//return view("admin.puesto.edit",["puesto"=>$puesto,"departamentos"=>$departamentos]);
        return view("admin.puesto.edit",["puesto"=>Puesto::findOrFail($id),"departamentos"=>$departamentos]);

    }
        
    public function update(PuestoFormRequest $request,$id)
    {
<<<<<<< HEAD
    	$puesto=Puesto::findOrFail($id);

        $puesto->iddepartamento=$request->get('iddepartamento');
        $puesto->nombrepuesto=$request->get('nombrepuesto');
        $puesto->descripcionpuesto=$request->get('descripcionpuesto');
        $puesto->salariopuesto=$request->get('salariopuesto');
    	
        $puesto->update();
=======
    	$affectedRows = Puesto::where('idpuesto','=',$id)
        ->update(['nombrepuesto'=> $request->get('nombrepuesto'),
            'descripcionpuesto'=>$request->get('descripcionpuesto'),
            'iddepartamento' =>$request->get('iddepartamento'),
            'salariopuesto'=>$request->get('salariopuesto')]);
        Session::flash('update','El puesto se ha actualizado');
        
>>>>>>> origin/wen
        return Redirect::to('admin/puesto');

        //$puesto=Puesto::findOrFail($id);
        //$puesto->iddepartamento=$request->get('iddepartamento');
        //$puesto->nombrepuesto=$request->get('nombrepuesto');
        //$puesto->descripcionpuesto=$request->get('descripcionpuesto');
        //$puesto->salariopuesto=$request->get('salariopuesto');
    	//$puesto->update();
        //return Redirect::to('admin/puesto');
    }   

    public function destroy($id)
    {
<<<<<<< HEAD
    	$puesto=Puesto::findOrFail($id);
        $puesto->delete();
=======
    	//$puesto=Puesto::findOrFail($id);
        //$puesto->condicion='0';
        //$puesto->update();
        $affectedRows = Puesto::where('idpuesto','=',$id)
        ->delete();

>>>>>>> origin/wen
        return Redirect::to('admin/puesto');
    }
}