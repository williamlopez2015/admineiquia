<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Empleado;

use sisadmineiquia\ExperienciaLaboralAcademica;

use Illuminate\Support\Facades\Redirect;

use sisadmineiquia\Http\Requests\ExperienciaLaboralAcademicaFormRequest;

use DB;

use Carbon\Carbon;

use Session;

class ExperienciaLaboralAcademicaController extends Controller
{
    //
    public function __construct(){

    }

    

    public function index(Request $request){
    	/*$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/
        
        if ($request)
        {
           
            //
            $experiencia=DB::table('experiencialaboral')->join('expedienteacademic','experiencialaboral.idexpedienteacadem','=','expedienteacademic.idexpedienteacadem')->join('empleado', 'expedienteacademic.idempleado', '=', 'empleado.idempleado')->get();
            //var_dump($expedienteadmin);
            return view('admin.experiencialaboralacademica.index',["experiencias"=>$experiencia]);
            
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
        
        return view("admin.experiencialaboralacademica.create",["empleados"=>$empleado,"puestos"=>$puesto]);
    }

    public function store(ExpedienteAdministrativoFormRequest $request){
        
        
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
                    $ad="AD";
                    $expedienteadministrativo=new ExpedienteAdministrativo;
                    $expedienteadministrativo->idexpediente=$ad.$p1[0].$p2[0].$request->get('idempleado');
                    $expedienteadministrativo->idempleado=$request->get('idempleado');
                    $expedienteadministrativo->idpuesto=$request->get('idpuesto');
                    $expedienteadministrativo->fechaapertura=$request->get('fechaapertura');
                    if ($request->get('tiempointegral')==null){
                        $expedienteadministrativo->tiempointegral="0";
                    }else{
                        $expedienteadministrativo->tiempointegral=$request->get('tiempointegral');
                    }
                    $expedienteadministrativo->codigocontrato=$request->get('codigocontrato');
                    $expedienteadministrativo->descripcionadmin=$request->get('descripcionadmin');
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
        /*****/
        $query=trim($id);

            $empleado=Empleado::find($query);
            //var_dump($empleado);
            $expacad  = DB::table('expedienteadminist')->select('idempleado')->where('idempleado','=',$query)->get();
            if ($expacad){
                
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

    public function update(ExpedienteAdministrativoFormRequest $request, $id){
        //dd($request->get('tiempointegral'));
        //dd($id);

        if ($request->get('tiempointegral')==null){
                        $tiempointegral=0;
                        $affectedRows = ExpedienteAdministrativo::where('idexpediente','=',$id)->update(['fechaapertura' =>$request->get('fechaapertura'),'codigocontrato' =>$request->get('codigocontrato'),'tiempointegral' =>$tiempointegral,'descripcionadmin'=>$request->get('descripcionadmin')]);
        Session::flash('update','El Expediente actualizado correctamente!!!');
        return Redirect::to('admin/empleado');
                    }else{
                        $tiempointegral=$request->get('tiempointegral');
                        $affectedRows = ExpedienteAdministrativo::where('idexpediente','=',$id)->update(['fechaapertura' =>$request->get('fechaapertura'),'codigocontrato' =>$request->get('codigocontrato'),'tiempointegral' => $tiempointegral,'descripcionadmin'=>$request->get('descripcionadmin')]);
        Session::flash('update','El Expediente actualizado correctamente!!!');
        return Redirect::to('admin/empleado');
                    }
    
    }
}
