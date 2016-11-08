<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;
use sisadmineiquia\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisadmineiquia\Http\Requests\AsistenciaFormRequest;
use sisadmineiquia\Asistencia;
use sisadmineiquia\DetalleAsistencia;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Response;
use Session;
use DB;

class AsistenciaController extends Controller
{
     public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request)
        {
            $asistencias=DB::table('asistencia')
            ->select('idasistencia','fechaasistencia','turno')
            ->get();
            
            return view('admin.asistencia.index',["asistencias"=>$asistencias]);
        }
    }

     public function create()
    {
        $empleados=DB::table('expedienteadminist as exp')
            ->join('empleado as emp','emp.idempleado','=','exp.idempleado')
            ->select('exp.idexpediente','exp.idempleado',DB::raw("CONCAT(emp.primernombre,' ', emp.segundonombre,' ',emp.primerapellido,' ', emp.segundoapellido) as nombre"))->get();

              $asistencias=DB::table('asistencia')
            ->select('idasistencia')
            ->get();

    	return view("admin.asistencia.create",["empleados"=>$empleados,"asistencias"=>$asistencias]);
    }

     public function store(AsistenciaFormRequest $request)
    {
    	
        try{
            DB::beginTransaction();

    		$asistencia=new Asistencia;
            $asistencia->idasistencia=$request->get('idasistencia');
        	$asistencia->fechaasistencia=$request->get('fechaasistencia');
        	$asistencia->turno=$request->get('turno');
        	$asistencia->save();

            $idexpediente=$request->get('idexpediente');
            $idempleado=$request->get('idempleado');
            $horaentrada=$request->get('horaentrada');
            $horasalida=$request->get('horasalida');
            $observaciones=$request->get('observaciones');

            $cont=0;

            while($cont <count($idempleado)){

                $detalle=new DetalleAsistencia;
                $detalle->idasistencia=$asistencia->idasistencia;
                $detalle->idexpediente=$idexpediente[$cont];
                $detalle->horaentrada=$horaentrada[$cont];
                $detalle->horasalida=$horasalida[$cont];
                $detalle->observaciones=$observaciones[$cont];
                $detalle->save();
                $cont=$cont+1;             
            }   

            DB::commit();

        }catch(\Exception $e)
        {
            DB::rollback();
        }
 
        Session::flash('store','¡La asitencia se ha almacenado correctamente!');
        return Redirect::to('admin/asistencia');
    }

     public function show($id)
    {   

    	$asistencia=DB::table('asistencia')
    		->select('fechaasistencia','turno')
            ->where('idasistencia','=',$id)
            ->get();

        $detalles=DB::table('detalleasistencia as det')
        	->join('expedienteadminist as exp','exp.idexpediente','=','det.idexpediente')
            ->join('empleado as emp','emp.idempleado','=','exp.idempleado')
            ->select('exp.idexpediente','exp.idempleado','det.iddetalleasistencia as iddetalle','det.horaentrada','det.horasalida','det.observaciones',
              DB::raw("CONCAT(emp.primernombre,' ', emp.segundonombre,' ',emp.primerapellido,' ', emp.segundoapellido) as nombre"))
            ->where('det.idasistencia','=',$id)
            ->get();
            
    	return view("admin.asistencia.show",["asistencia"=>$asistencia,"detalles"=>$detalles]);
    }

    public function edit($id)
    {   
        $empleados=DB::table('expedienteadminist as exp')
            ->join('empleado as emp','emp.idempleado','=','exp.idempleado')
            ->select('exp.idexpediente','exp.idempleado',DB::raw("CONCAT(emp.primernombre,' ', emp.segundonombre,' ',emp.primerapellido,' ', emp.segundoapellido) as nombre"))->get();

        $asistencia=DB::table('asistencia')
            ->select('idasistencia','fechaasistencia','turno')
            ->where('idasistencia','=',$id)
            ->get();

        $detalles=DB::table('detalleasistencia as det')
            ->join('expedienteadminist as exp','exp.idexpediente','=','det.idexpediente')
            ->join('empleado as emp','emp.idempleado','=','exp.idempleado')
            ->select('exp.idexpediente','exp.idempleado','det.iddetalleasistencia as iddetalle','det.horaentrada','det.horasalida','det.observaciones',
              DB::raw("CONCAT(emp.primernombre,' ', emp.segundonombre,' ',emp.primerapellido,' ', emp.segundoapellido) as nombre"))
            ->where('det.idasistencia','=',$id)
            ->get();
            
        return view("admin.asistencia.edit",["asistencia"=>$asistencia,"detalles"=>$detalles,"empleados"=>$empleados]);
    }

    public function update(AsistenciaFormRequest $request,$id)
    {
        $affectedRows = Asistencia::where('idasistencia','=',$id)
        ->update(['idasistencia'=> $request->get('idasistencia'),
            'fechaasistencia'=>$request->get('fechaasistencia'),
            'turno' =>$request->get('turno')]);

        $affectedRows = DetalleAsistencia::where('iddetalleasistencia','=',$id)
        ->update(['idexpediente'=> $request->get('idexpediente'),
            'idasistencia'=>$request->get('idasistencia'),
            'horaentrada' =>$request->get('horaentrada'),
            'horasalida'=>$request->get('horasalida'),
            'observaciones'=>$request->get('observaciones')]);

        Session::flash('update','¡El detalle de asitencia se ha actualizado!');       
        return Redirect::to('admin/asistencia');
    }

    public function destroy($id)
    {
        $affectedRows = DetalleAsistencia::where('idasistencia','=',$id)->delete();
        $affectedRows = Asistencia::where('idasistencia','=',$id)->delete();

        Session::flash('destroy','¡El registro fue eliminado correctamente!');
        return Redirect::to('admin/asistencia');
        
    }
}
