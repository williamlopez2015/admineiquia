@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="empleado/"> Administrar Empleados</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Crear Empleado</li>
    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Nuevo Empleado</h3>
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

			{!!Form::open(array('url'=>'admin/empleado','method'=>'POST','autocomplete'=>'off','files'=>true, 'id' => 'my-dropzone'))!!}
            {{Form::token()}}
            <div class="form-group">
			{!!Form::label('Foto','Foto:')!!}
			{!!Form::file('foto')!!}
			</div>
            <div class="form-group">
            	<label for="primernombre">Primer Nombre</label>
            	<input type="text" name="primernombre" class="form-control" placeholder="Primer Nombre...">
            </div>
            <div class="form-group">
            	<label for="segundonombre">Segundo Nombre</label>
            	<input type="text" name="segundonombre" class="form-control" placeholder="Segundo Nombre...">
            </div>
            <div class="form-group">
            	<label for="primerapellido">Primer Apellido</label>
            	<input type="text" name="primerapellido" class="form-control" placeholder="Primer Apellido...">
            </div>
            <div class="form-group">
            	<label for="segundoapellido">Segundo Apellido</label>
            	<input type="text" name="segundoapellido" class="form-control" placeholder="Segundo Apellido...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">     
			<div class="form-group">
				<label>Documento de Identidad</label>
				<input class="form-control" name="dui" class="form-control" placeholder="00000000-0">
			</div>
			<div class="form-group">
				<label>Numero de Identificacion Tributaria</label>
				<input class="form-control" name="nit" class="form-control" placeholder="0000-000000-000-0">
			</div>
			<div class="form-group">
				<label>Numero del Seguro Social</label>
				<input class="form-control" name="isss" class="form-control" placeholder="00000000">
			</div>
			<div class="form-group">
				<label>Numero de AFP</label>
				<input class="form-control" name="afp" class="form-control" placeholder="000000">
			</div>        
		</div>            
		</div>
                    {!!Form::close()!!}		

</div>



@endsection