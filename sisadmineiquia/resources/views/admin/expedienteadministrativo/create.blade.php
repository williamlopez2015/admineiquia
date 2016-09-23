@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="admin/empleado">Administrar Empleados</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Nuevo Expediente Administrativo</li>
    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Nuevo Expediente Administrativo de Empleado</h3>
	</div>
 </div>
 <div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'admin/expedienteadministrativo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}    
			<div class="form-group">
				<label>Fecha Apertura Expediente Administrativo</label>
				<input  type="text" name="fechaapertura" class="tcal form-control" placeholder="00/00/0000" id="fechaApertura" onkeyup="corregirFecha();">
				<div id="mensajeFechaAper" class="errores">Fecha invalida</div> 
			</div>
			<div class="form-group">
				<label>Codigo Contrato</label>
				<input class="form-control" name="codigocontrato" class="form-control" placeholder="AA0000" id="codCon" onkeyup="corregirCodCon();">
        <div id="mensajeCodCon" class="errores">Código invalido</div>
			</div>
			<div class="form-group">
                  <label>Empleado</label>
                  <select name="idempleado" class="form-control" id="idempleados">
                   @foreach ($empleados as $emp)
                         <option value="{{$emp->idempleado}}">{{$emp->primernombre}}</option>
                   @endforeach
                  </select>  
                  <div id="mensajeEmp" class="errores">No se ha seleccionado un empleado</div>      
			</div>
			<div class="form-group">
                  <label>Puesto</label>
                  <select name="idpuesto" class="form-control" id="idpuestos">
                   @foreach ($puestos as $pues)
                         <option value="{{$pues->idpuesto}}">{{$pues->nombrepuesto}}</option>
                   @endforeach
                  </select>
                  <div id="mensajePue" class="errores">No se ha seleccionado un puesto</div>     
			</div>
			<div class="form-group">
			    <label>Tiempo Adicional Inicio:</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="tiempoadicionalinicio" class="tcal form-control" placeholder="00/00/0000" id="fechaAdInicio" onkeyup="corregirFecha2();"/>
                </div>
            </div>
            <div class="form-group">
			    <label>Tiempo Adicional Fin:</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="tiempoadicionalfin" class="tcal form-control" placeholder="00/00/0000" id="fechaAdFin" onkeyup="corregirFecha3();"/>
                </div>
            </div>
			<div class="form-group">
			    <label>Tiempo Integral Inicio:</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="tiempointegralinicio" class="tcal form-control" placeholder="00/00/0000" id="fechaInInicio" onkeyup="corregirFecha4();"/>
                </div>
            </div>
            <div class="form-group">
			    <label>Tiempo Integral Fin:</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="tiempointegralfin" class="tcal form-control" placeholder="00/00/0000" id="fechaInFin" onkeyup="corregirFecha5();"/>
                </div>
            </div>
			<div class="form-group">
                <label>Observacion</label>
                <textarea  name="descripcionadmin" class="form-control"  rows="3" placeholder="Descripcion de el empleado"></textarea>
            </div>
			<div class="form-group">
            	<button class="btn btn-primary" type="submit" id="guardarExp">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>    
		</div>
                    {!!Form::close()!!}		

</div>



@endsection