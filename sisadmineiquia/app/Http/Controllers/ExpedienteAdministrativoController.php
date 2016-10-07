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

use Session;


class ExpedienteAdministrativoController extends Controller
{
    //
     //
    public function __construct(){

    }

    

    public function index(Request $request){
        
        if ($request)
        {
           
            //
            $expedienteadmin=DB::table('expedienteadminist')->get();
            //var_dump($expedienteadmin);
            return view('admin.expedienteadministrativo.index',["expedienteadministrativos"=>$expedienteadmin]);
            
        }
    }

    public function create(){
        //$empleado = Empleado::lists('primernombre','idempleado');
        // Llamamos al método raw y le pasamos nuestra parte de consulta que queremos realizar.
        $raw = DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto");
        
        // Llamamos a Empleado, utilizamos el método select y le pasamos el $raw almacenado en la linea superior.
        $empleado  = Empleado::select($raw)->get();
        $puesto = DB::table('puesto')->select('idpuesto','nombrepuesto')->get();
        //return view("admin.expedienteadministrativo.create",["empleados"=>$empleado,"puestos"=>$puesto]);
        
        return view("admin.expedienteadministrativo.create",["empleados"=>$empleado,"puestos"=>$puesto]);
    }

    public function store(Request $request){
        
        
        if ($request)
        {
            $query=trim($request->get('idempleado'));

            $empleado=Empleado::find($query);
            //var_dump($empleado);
            $expadmin  = DB::table('expedienteadminist')->select('idempleado')->where('idempleado','=',$query)->get();
            if ($expadmin){
                Session::flash('store','El Expediente ya existe!!!');
            }else{
                    $p1=ucfirst($empleado->PRIMERAPELLIDO);
                    $p2=ucfirst($empleado->SEGUNDOAPELLIDO);
                    $expedienteadministrativo=new ExpedienteAdministrativo;
                    $expedienteadministrativo->idempleado=$request->get('idempleado');
                    $expedienteadministrativo->idpuesto=$request->get('idpuesto');
                    $expedienteadministrativo->fechaapertura=$request->get('fechaapertura');
                    $expedienteadministrativo->tiempointegral=$request->get('tiempointegral');
                    $expedienteadministrativo->codigocontrato=$request->get('codigocontrato');
                    $expedienteadministrativo->save();
                    Session::flash('store','El Expediente creado correctamente!!!');
                    return Redirect::to('admin/empleado');
                }
        }
        return Redirect::to('admin/expedienteadministrativo/create');

    }
    public function show($id){
        return view("admin.empleado.show",["empleado"=>Empleado::findOrFail($id)]);
    }

    public function edit($id){
        $query=trim($id);

            $empleado=Empleado::find($query);
            //var_dump($empleado);
            $expadmin  = DB::table('expedienteadminist')->select('idempleado')->where('idempleado','=',$query)->get();
            if ($expadmin){
                
                /*$users = DB::table('users')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('status')
                     ->get();*/
        // Llamamos al método raw y le pasamos nuestra parte de consulta que queremos realizar.
                     $raw = DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto");
                     // Llamamos a Empleado, utilizamos el método select y le pasamos el $raw almacenado en la linea superior.
                     $empleado  = Empleado::select($raw)->where('idempleado', '=',$query)->get();
                     $expadmin  = DB::table('expedienteadminist')->select('idexpediente')->where('idempleado','=',$query)->get();
                     $expadminid=$expadmin[0]->idexpediente;
                     $puesto = DB::table('puesto')->select('idpuesto','nombrepuesto')->get();
                     return view("admin/expedienteadministrativo.edit",["empleados"=>$empleado,"expedienteadministrativo"=>ExpedienteAdministrativo::findOrFail($expadminid),"puestos"=>$puesto]);
            }else{
                Session::flash('edit','Aun no existe Expediente!!!');
                return Redirect::to('admin/empleado');

            }
    }

    public function update(Request $request, $id){
    
        $affectedRows = ExpedienteAdministrativo::where('idexpediente','=',$id)->update(['fechaapertura' =>$request->get('fechaapertura'),'codigocontrato' =>$request->get('codigocontrato'),'tiempoadicionalinicio' =>$request->get('tiempoadicionalinicio'),'tiempoadicionalfin' =>$request->get('tiempoadicionalfin'),'tiempointegralinicio' =>$request->get('tiempointegralinicio'),'tiempointegralfin' => $request->get('tiempointegralfin'),'descripcionadmin' => $request->get('descripcionadmin')]);
        Session::flash('update','El Expediente actualizado correctamente!!!');
        return Redirect::to('admin/empleado');
    }
}
