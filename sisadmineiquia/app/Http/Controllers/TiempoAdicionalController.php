<?php

namespace sisadmineiquia\Http\Controllers;

use Illuminate\Http\Request;

use sisadmineiquia\Http\Requests;

use sisadmineiquia\Tiempo;

use sisadmineiquia\ExpedienteAdministrativo;

use sisadmineiquia\Puesto;

use Illuminate\Support\Facades\Redirect;

use sisadmineiquia\Http\Requests\TiempoAdicionalFormRequest;

use DB;

use Carbon\Carbon;

use Session;

class TiempoAdicionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     

     $raw = DB::raw("idempleado,CONCAT(primernombre,' ', segundonombre,' ',primerapellido,' ', segundoapellido) as nombrecompleto");
     $empleado  = Empleado::select($raw)->get();

        
    return view("admin.tiempo.create",["empleado"=>$empleado]);
     

    }

    /**
     * Store a newly created resource in storage.
     * $departamentos=DB::table('departamento as d')
        ->select('d.iddepartamento','d.nombredepartamento')->get();
        
        return view("admin.puesto.create",["departamentos"=>$departamentos]);
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tiempo=new Tiempo;
        $tiempo->idempleado=$request->get('idempleado');
        $tiempo->idciclo=$request->get('idciclo');
        $tiempo->fechainicio=$request->get('tiempoadicionalinicio');
        $tiempo->fechafin=$request->get('tiempoadicionalfin');
        $tiempo->descripcion=$request->get('descripcion');
        $tiempo->save();
        Session::flash('store','El tiempo fue anexado  correctamente!!!');
        return Redirect::to('admin/tiempo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
