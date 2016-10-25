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

use Illuminate\Support\Facades\Input;

use PDF;

use Illuminate\Http\Response;

class EmpleadoController extends Controller
{
    //
    public function __construct(){

    }
 

    public function index(Request $request){
    	
    	if ($request)
        {
            
             // Llamamos al método raw y le pasamos nuestra parte de consulta que queremos realizar.
			$raw = DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto,dui,nit,estado,foto");
		
			// Llamamos a Persona, utilizamos el método select y le pasamos el $raw almacenado en la linea superior.
			$empleados = Empleado::select($raw)->get();
			return view('admin.empleado.index',["empleados"=>$empleados]);
        }
    }

    public function create(){
    	return view("admin.empleado.create");
    }

    public function store(EmpleadoFormRequest $request){
    	
    	$empleados=new Empleado;

        if(Input::hasfile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/fotos/empleados',Carbon::now()->second.$file->getClientOriginalName());
            $empleados->foto=Carbon::now()->second.$file->getClientOriginalName();
        }

		$pnombre=$request->get('primernombre');
		$snombre=$request->get('segundonombre');
		$papellido=$request->get('primerapellido');
		$sapellido=$request->get('segundoapellido');
		$empleados->primernombre=ucfirst($pnombre);
    	$empleados->segundonombre=ucfirst($snombre);
    	$empleados->primerapellido=ucfirst($papellido);
    	$empleados->segundoapellido=ucfirst($sapellido);
    	$empleados->dui=$request->get('dui');
    	$empleados->nit=$request->get('nit');
    	$empleados->isss=$request->get('isss');
    	$empleados->afp=$request->get('afp');
        $empleados->sexo=$request->get('sexo');
    	$empleados->estado='1';
    	$empleados->save();
    	Session::flash('store','El Empleado creado correctamente!!!');
    	return Redirect::to('admin/empleado');
    }
   
    public function show($id){
        $empleado = DB::table('empleado')->select(DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto,dui,nit,estado,foto,isss,afp,sexo"))->where('idempleado', '<>', $id)->get();
    	return view("admin.empleado.show",["empleado"=>$empleado]);
    }

    public function perfilreport($id){
        //dd($id);
        /*$pdf = new PDF();    
        $pdf::loadHtml('hello world');
        $pdf::setPaper('A4', 'landscape');
        dd($pdf);

        return $pdf::stream();*/
        //$perfil1::Output(public_path("/documentos/pdf/".'perfil'. $id . '.pdf'),'I');
        //$perfil1::reset();
        // Llamamos al método raw y le pasamos nuestra parte de consulta que queremos realizar.

        /*$users = DB::table('users')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('status')
                     ->get();*/
            //$raw = DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto,dui,nit,estado,foto")->where('idempleado', '<>', $id);
        
            // Llamamos a Persona, utilizamos el método select y le pasamos el $raw almacenado en la linea superior.
            $empleado = DB::table('empleado')->select(DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto,dui,nit,estado,foto,isss,afp,sexo"))->where('idempleado', '=', $id)->get();
        $pdf = PDF::loadView('admin.empleado.show',["empleado"=>$empleado]);
        return $pdf->stream('show.pdf');

    }

    public function nominareport(){
        $empleados = DB::table('empleado')->select(DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto,dui,nit,estado,foto"))->where('estado', '=', '1')->get();

        $pdf = PDF::loadView('admin.empleado.nomina',["empleados"=>$empleados]);
        return $pdf->stream('nomina.pdf');

    }

    public function nominareportdownload(){
        $empleados = DB::table('empleado')->select(DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto,dui,nit,estado,foto"))->where('estado', '=', '1')->get();

        $pdf = PDF::loadView('admin.empleado.nomina',["empleados"=>$empleados]);
        return $pdf->download('nomina.pdf');

    }

    public function perfilreportdownload($id){
        //dd($id);
        
    }

    public function edit($id){
    	return view("admin.empleado.edit",["empleado"=>Empleado::findOrFail($id)]);
    }
   
    public function update(EmpleadoFormRequest $request, $id){
        //dd($request->get('foto'));
        //dd(Input::hasfile('foto'));
        $pnombre=$request->get('primernombre');
        $snombre=$request->get('segundonombre');
        $papellido=$request->get('primerapellido');
        $sapellido=$request->get('segundoapellido');
        if(Input::hasfile('foto')){
            $file=Input::file('foto');
            //dd($file->getClientOriginalName());
            $empleado=Empleado::findOrFail($id);
            $fotovieja=$empleado->FOTO;
            if (is_file(public_path().'/fotos/empleados/'.$fotovieja)) {
            unlink(public_path().'/fotos/empleados/'.$fotovieja);
            } 
            $file->move(public_path().'/fotos/empleados',Carbon::now()->second.$file->getClientOriginalName());
            $affectedRows = Empleado::where('idempleado','=',$id)->update(['primernombre' => ucfirst($pnombre),'segundonombre' =>ucfirst($snombre),'primerapellido' =>ucfirst($papellido),'segundoapellido' =>ucfirst($sapellido),'dui' =>$request->get('dui'),'nit' => $request->get('nit'),'isss' => $request->get('isss'),'afp' => $request->get('afp'),'foto'=>Carbon::now()->second.$file->getClientOriginalName()]);
                Session::flash('update','El Empleado actualizado correctamente!!!');
                return Redirect::to('admin/empleado');
        }else{
            $affectedRows = Empleado::where('idempleado','=',$id)->update(['primernombre' => ucfirst($pnombre),'segundonombre' =>ucfirst($snombre),'primerapellido' =>ucfirst($papellido),'segundoapellido' =>ucfirst($sapellido),'dui' =>$request->get('dui'),'nit' => $request->get('nit'),'isss' => $request->get('isss'),'afp' => $request->get('afp')]);
                Session::flash('update','El Empleado actualizado correctamente!!!');
                return Redirect::to('admin/empleado');
        }
    }
   
    public function destroy($id){
    	$empleado=Empleado::findOrFail($id);
    	//var_dump($empleado);
    	if($empleado->ESTADO=='1')
    	{
    		$affectedRows = Empleado::where('idempleado','=',$id)->update(['estado' => 0]);
    		return  Redirect::to('admin/empleado');
    	}else{
    		$affectedRows = Empleado::where('idempleado','=',$id)->update(['estado' => 1]);
    		return  Redirect::to('admin/empleado');
    	}
    }

}
