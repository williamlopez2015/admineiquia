@extends('layouts.admin')
@section('contenido')
<div class="row">
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="/admin/empleado">Administrar Empleados</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Editar Expediente Academico

    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Editar Expediente Academico de Empleado:
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
			{!!Form::model($expedienteacademico,['method'=>'PATCH','route'=>['admin.expedienteacademico.update',$expedienteacademico->IDEXPEDIENTEACADEM]])!!}
            {{Form::token()}}
           <div class="form-group">
				<label>Fecha Apertura Expediente Academico</label>
				<input  type="text" name="fechaaperturaexpacad" class="tcal form-control" placeholder="00/00/0000" id="fechaaperturaexpacad">
				<div id="mensajeFechaAper" class="errores">Fecha invalida</div> 
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
            	<label for="nombreinstitucion">Nombre Institucion</label>
            	<input type="text" name="nombreinstitucion" value="{{old('nombreinstitucion')}}" class="form-control" placeholder="Nombre Institucion..." id="nombreinstitucion" >
            	<div id="mensaje1" class="errores">Nombre invalido</div>
            </div>

            <div class="form-group">
				<label>Año de Titulacion</label>
				<input  type="text" name="anotitulacion" class="tcal form-control" placeholder="00/00/0000" id="anotitulacion" >
				<div id="mensajeFechaAper" class="errores">Fecha invalida</div> 
			</div>
			<div class="container">

</div>
			 
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		<div class="form-group">
            	<label for="tituloobtenido">Titulo Obtenido</label>
            	<input type="text" name="tituloobtenido" value="{{old('tituloobtenido')}}" class="form-control" placeholder="Titulo Obtenido..." id="tituloobtenido" >
            	<div id="mensaje1" class="errores">Nombre invalido</div>
            </div>

        <div class="form-group">
            	<label for="tituloestudio">Titulo Estudio</label>
            	<input type="text" name="tituloestudio" value="{{old('tituloestudio')}}" class="form-control" placeholder="Titulo Estudio..." id="tituloestudio" >
            	<div id="mensaje1" class="errores">Nombre invalido</div>
            </div>

            <div class="form-group">
            	<label for="direccioninstitucion">Direccion Institucion </label>
            	<input type="text" name="direccioninstitucion" value="{{old('direccioninstitucion')}}" class="form-control" placeholder="Direccion Institucion..." id="direccioninstitucion" >
            	<div id="mensaje1" class="errores">Direccion invalida</div>
            </div>

            <div class="form-group">
                <label>Descripcion Academica</label>
                <textarea  name="descripcionacademica" id="descripcionacademica" class="form-control"  rows="3" placeholder="Descripcion Academica">{{old('descripcionacademica')}}</textarea>
            </div>

            <div class="form-group" align=right>
            	<button class="btn btn-primary" type="submit" >Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

		</div>

		
                    {!!Form::close()!!}		

</div>

@endsection