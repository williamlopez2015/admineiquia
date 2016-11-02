<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;
use sisadmineiquia\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisadmineiquia\Http\Requests\PermisoFormRequest;
use sisadmineiquia\Permiso;
use Carbon\Carbon;
use Session;
use DB;

class PermisoController extends Controller
{
   public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request)
        {
            $permisos=DB::table('permiso as p')
            ->join('expedienteadminist as exp','exp.idexpediente','=','p.idexpediente')
            ->join('empleado as emp','emp.idempleado','=','exp.idempleado')
            ->select('exp.idexpediente','exp.idempleado','p.idpermiso','p.fechasolicitud','p.motivopermiso','p.tiemposolicitado','p.gocesueldo','p.estadopermiso','p.fechapermiso','p.cargodocente','p.numerotarjeta',DB::raw("CONCAT(emp.primernombre,' ', emp.segundonombre,' ',emp.primerapellido,' ', emp.segundoapellido) as nombre"))
            ->get();
            
            return view('admin.permiso.index',["permisos"=>$permisos]);
        }
    }

     public function create()
    {
        $empleados=DB::table('expedienteadminist as exp')
            ->join('empleado as emp','emp.idempleado','=','exp.idempleado')
            ->select('exp.idexpediente','exp.idempleado',DB::raw("CONCAT(emp.primernombre,' ', emp.segundonombre,' ',emp.primerapellido,' ', emp.segundoapellido) as nombre"))->get();

    	return view("admin.permiso.create",["empleados"=>$empleados]);
    }

     public function store(PermisoFormRequest $request)
    {
    	$permiso=new Permiso;
        $permiso->idexpediente=$request->get('idexpediente');
        $permiso->fechasolicitud=$request->get('fechasolicitud');
        $permiso->motivopermiso=$request->get('motivopermiso');
        $permiso->tiemposolicitado=$request->get('tiemposolicitado');
        $permiso->gocesueldo=$request->get('gocesueldo');
        $permiso->estadopermiso=$request->get('estadopermiso');
        $permiso->fechapermiso=$request->get('fechapermiso');
        $permiso->cargodocente=$request->get('cargodocente');
        $permiso->numerotarjeta=$request->get('numerotarjeta');
        $permiso->save();
                      
        Session::flash('store','¡El permiso se ha almacenado correctamente!');
        return Redirect::to('admin/permiso');
    }

     public function show($id)
    {
    
    }

    public function edit($id)
    {   
        $permiso=DB::table('permiso as p')
            ->join('expedienteadminist as exp','exp.idexpediente','=','p.idexpediente')
            ->join('empleado as emp','emp.idempleado','=','exp.idempleado')
            ->select('exp.idexpediente','exp.idempleado','p.idpermiso','p.fechasolicitud','p.motivopermiso','p.tiemposolicitado','p.gocesueldo','p.estadopermiso','p.fechapermiso','p.cargodocente','p.numerotarjeta',DB::raw("CONCAT(emp.primernombre,' ', emp.segundonombre,' ',emp.primerapellido,' ', emp.segundoapellido) as nombre"))
            ->where('p.idpermiso','=',$id)
            ->get();
            
        return view("admin.permiso.edit",["permiso"=>$permiso]);
    }

     public function update(PermisoFormRequest $request,$id)
    {

        $affectedRows = Permiso::where('idpermiso','=',$id)
        ->update(['idexpediente'=> $request->get('idexpediente'),
            'fechasolicitud'=>$request->get('fechasolicitud'),
            'motivopermiso' =>$request->get('motivopermiso'),
            'tiemposolicitado' =>$request->get('tiemposolicitado'),
            'gocesueldo'=>$request->get('gocesueldo'),
            'estadopermiso'=>$request->get('estadopermiso'),
            'fechapermiso'=>$request->get('fechapermiso'),
            'cargodocente' =>$request->get('cargodocente'),
            'numerotarjeta' =>$request->get('numerotarjeta')]);
        Session::flash('update','¡El permiso se ha actualizado correctamente!');       
        return Redirect::to('admin/permiso');
    }

     public function destroy($id)
    {
        $affectedRows = Permiso::where('idpermiso','=',$id)->delete();
        Session::flash('destroy','¡El permiso fue eliminado correctamente!');
        return Redirect::to('admin/permiso');
        
    }
}
