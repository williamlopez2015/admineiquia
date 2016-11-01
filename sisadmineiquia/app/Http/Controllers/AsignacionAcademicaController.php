<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Empleado;

use sisadmineiquia\ExpedienteAcademico;

use sisadmineiquia\Ciclo;

use sisadmineiquia\CargaAcademica;

use sisadmineiquia\Http\Requests\AsignacionAcademicaRequest;

use DB;

use Carbon\Carbon;

use Session;

class AsignacionAcademicaController extends Controller
{
    

    public function __construct(){ }


public function index(Request $request){
        
        if ($request)
        {
            $cargaacad=DB::table('asignacionacademic')->get();
            return view('admin.cargaacademica.index',["cargaacademicas"=>$cargaacad]);
        }
    }//Final del Index



 public function create()
    {
     
     $raw = DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto");
     $empleado  = Empleado::select($raw)->get();
     $ciclo=Ciclo::all();
    return view("admin.cargaacademica.create",["empleados"=>$empleado,"ciclos"=>$ciclo]);
    } //Fin de create


 public function store(AsignacionAcademicaRequest $request){
    
            $query=trim($request->get('idempleado'));    
            $empleado=Empleado::find($query);
             $expacad = DB::table('expedienteacademic')->select('idexpedienteacadem')->where('idempleado','=',$query)->get();

           if($expacad!=null){
                    $cargaacademica=new CargaAcademica;
                    $p1=ucfirst($empleado->PRIMERAPELLIDO);
                    $p2=ucfirst($empleado->SEGUNDOAPELLIDO);
                    $ac="AC";
                    $cargaacademica->idexpedienteacadem=$ac.$p1[0].$p2[0].$request->get('idempleado');
                    $cargaacademica->idciclo=$request->get('idciclo');
                    $cargaacademica->ano=$request->get('anocarga');
                    $cargaacademica->codasignatura=$request->get('codigoasignatura');
                    $cargaacademica->nombreasignatura=$request->get('nombreasignatura');
                    $cargaacademica->gteorico=$request->get('grupoteorico');
                    $cargaacademica->gdiscusion=$request->get('grupodiscusion');
                    $cargaacademica->glaboratorio=$request->get('grupolaboratorio');
                     $cargaacademica->tiempototal=$request->get('tiempototal');
                    $cargaacademica->responsabilidadadmin=$request->get('responsabilidadacademica');
                    $cargaacademica->save();
                   Session::flash('store','La carga Academica fue creada corectamente!!!');
                    return Redirect::to('admin/cargaacademica');
                }else{
                    Session::flash('store','El Empleado no Posee un Expediente Academico!!!');
                    return Redirect::to('admin/cargaacademica/create');
                }// Fin de la funcion que verifica si posee Expediente academico


    }//Fin Store

     public function show($id)
    {
        return view("admin.cargaacademica.show",["cargaacademica"=>CargaAcademica::findOrFail($id)]);
    }

    public function edit($id)
    {   
       $ciclos = DB::table('ciclo')->select('idciclo','nombreciclo')->get();
       $empleados = DB::table('empleado')->select('idempleado','primernombre','segundonombre','primerapellido','segundoapellido')->get();
        //dd($empleados);
        return view("admin.cargaacademica.edit",["cargaacademica"=>CargaAcademica::findOrFail($id),"empleados"=>$empleados,"ciclos"=>$ciclos]);    

    }//Fin del EDIT


    public function update(AsignacionAcademicaRequest $request, $id){

                        $affectedRows = ExpedienteAcademico::where('idasignacionacad','=',$id)
                        ->update([
                            'ano' =>$request->get('anocarga'),
                            'codasignatura' =>$request->get('codigoasignatura'),
                            'nombreasignatura' =>$request->get('nombreasignatura'),
                            'gteorico' =>$request->get('grupolaboratorio'),
                            'gdiscusion' =>$request->get('grupodiscusion'),
                            'glaboratorio' =>$request->get('glaboratorio'),
                            'tiempototal' =>$request->get('tiempototal'),
                            'responsabilidadadmin' =>$request->get('responsabilidadacademica'),
                            ]);
                         Session::flash('update','La carga fue actualizada correctamente!!!');
                         return Redirect::to('admin/cargaacademica');
                }// END UPDATE
    


    
} //Llave Final
