@extends('layouts.admin')
@section('contenido')
<div class="row">
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="admin/empleado">Administrar Empleados</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Editar Expediente Administrativo

    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Editar Expediente Administrativo de Empleado:
			@foreach ($empleados as $emp)
			{{$emp->nombrecompleto}}
			@endforeach </h3>

	</div>
 </div>
 <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			@include('mensajes.messages')
			{!!Form::model($expedienteadministrativo,['method'=>'PATCH','route'=>['admin.expedienteadministrativo.update',$expedienteadministrativo->IDEXPEDIENTE]])!!}
            {{Form::token()}}
			<div class="form-group">
				<label>Fecha Apertura Expediente Administrativo</label>
				<input  type="text" name="fechaapertura" value="{{$expedienteadministrativo->FECHAAPERTURA}}" class="tcal form-control"placeholder="00/00/0000" id="fechaApertura" onkeyup="corregirFecha();">
				<div id="mensajeFechaAper" class="errores">Fecha invalida</div> 
			</div>
			<div class="form-group">
				<label>Codigo Contrato</label>
				<input class="form-control" name="codigocontrato" class="form-control" value="{{$expedienteadministrativo->CODIGOCONTRATO}}"placeholder="AA0000" id="codCon" onkeyup="corregirCodCon();">
        	<div id="mensajeCodCon" class="errores">Código invalido</div>
             </div>
			<div class="form-group">
                  <label>Empleado</label>
                  <select name="idempleado" class="form-control" id="idempleados">
                   @foreach ($empleados as $emp)
                         <option value="{{$emp->idempleado}}">{{$emp->nombrecompleto}}</option>
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
                         <label>Tiempo Integral</label>
                         <div class="checkbox">
                         	<label>
                         		<input type="checkbox" value="{{$expedienteadministrativo->TIEMPOINTEGRAL}}" name="tiempointegral" id="tiempointegral" checked> Posee
                         	</label>
                         </div>
                       
                        
                         </div>
			<div class="form-group" align=right>
            	<button class="btn btn-primary" type="submit" id="guardarExp">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>    
		</div>
		
                    {!!Form::close()!!}		

		</div>
                    {!!Form::close()!!}	

</div>



@endsection