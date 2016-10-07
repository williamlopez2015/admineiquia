@extends('layouts.admin')
@section('contenido')
<div class="row">
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="../../admin/tiempo">Tiempo Adicional</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Nuevo Tiempo Adicional</li>
    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Tiempo Adicional </h3>

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

			{!!Form::open(array('url'=>'admin/tiempo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}  

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
				<label>Codigo Ciclo</label>
				<input class="form-control" name="idciclo" class="form-control">
        	<div id="mensajeCodCon" class="errores">Ciclo invalido</div>  

			<div class="form-group" align=right>
            	<button class="btn btn-primary" type="submit" id="guardarExp">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>    
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            
				<label>Tiempo Adicional Inicio:</label>
				<input  type="text" name="tiempoadicionalinicio" class="tcal form-control" placeholder="00/00/0000" id="tiempoadicionalinicio" onkeyup="corregirFecha2();">
			</div>
			<div class="form-group">
				<label>Tiempo Adicional Fin:</label>
				<input type='text' name="tiempoadicionalfin" class="tcal form-control" placeholder="00/00/0000" id="fechaAdFin" onkeyup="corregirFecha3();"/>
			</div>
			
			<div class="form-group">
                <label>Descripcion</label>
                <textarea  name="descripcion" class="form-control"  rows="3" placeholder="Descripcion de el Tiempo Adicional"></textarea>
            </div>
            <div class="form-group">
                <label>Descripcion II</label>
                <textarea  name="descripcion2" class="form-control"  rows="3" placeholder="Descripcion de el Tiempo Adicional 2"></textarea>
            </div>
		</div>
                    {!!Form::close()!!}		

</div>



@endsection