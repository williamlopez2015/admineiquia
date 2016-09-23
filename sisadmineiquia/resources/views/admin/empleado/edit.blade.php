@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="empleado/"> Administrar Empleados</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Editar Empleado</li>
    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Editar Empleado : {{$empleado->PRIMERNOMBRE}}</h3>
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

			{!!Form::model($empleado,['method'=>'put','action'=>['EmpleadoController@update',$empleado->IDEMPLEADO]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="foto">Foto</label>
            	<input type="file" name="foto">
            </div>
            <div class="form-group">
            	<label for="primernombre">Primer Nombre</label>
            	<input type="text" name="primernombre" class="form-control" value="{{$empleado->PRIMERNOMBRE}}" placeholder="Primer Nombre...">
            </div>
            <div class="form-group">
            	<label for="segundonombre">Segundo Nombre</label>
            	<input type="text" name="segundonombre" class="form-control" value="{{$empleado->SEGUNDONOMBRE}}" placeholder="Segundo Nombre...">
            </div>
            <div class="form-group">
            	<label for="primerapellido">Primer Apellido</label>
            	<input type="text" name="primerapellido" class="form-control" value="{{$empleado->PRIMERAPELLIDO}}"  placeholder="Primer Apellido...">
            </div>
            <div class="form-group">
            	<label for="segundoapellido">Segundo Apellido</label>
            	<input type="text" name="segundoapellido" class="form-control" value="{{$empleado->SEGUNDOAPELLIDO}}" placeholder="Segundo Apellido...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">     
			<div class="form-group">
				<label>Documento de Identidad</label>
				<input class="form-control" name="dui" class="form-control" value="{{$empleado->DUI}}" placeholder="00000000-0">
			</div>
			<div class="form-group">
				<label>Numero de Identificacion Tributaria</label>
				<input class="form-control" name="nit" class="form-control"value="{{$empleado->NIT}}"  placeholder="0000-000000-000-0">
			</div>
			<div class="form-group">
				<label>Numero del Seguro Social</label>
				<input class="form-control" name="isss" class="form-control" value="{{$empleado->ISSS}}"  placeholder="00000000">
			</div>
			<div class="form-group">
				<label>Numero de AFP</label>
				<input class="form-control" name="afp" class="form-control" value="{{$empleado->AFP}}"  placeholder="000000">
			</div>            
		</div>
		{!!Form::close()!!}		

</div>



@endsection