@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="/admin/acuerdos"> Administrar Acuerdos Administrativos</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Crear Acuerdo Administrativo</li>
    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Nuevo Acuerdo Administrativo</h3>
	</div>
 </div>
@include('mensajes.errores')
 <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      @include('mensajes.messages')
			{!!Form::open(array('url'=>'admin/acuerdos','method'=>'POST','autocomplete'=>'off','files'=>true))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="idacuerdo">Código</label>
            	<input type="text" name="idacuerdo" class="form-control" required value="{{old('idacuerdo')}}" placeholder="Código Acuerdo..." id="idacuerdo";">
            </div>
            <div class="form-group">
				<label for="foto"> Documento Acuerdo Administrativo</label>
				<input type="file"  class="form-control" name="archivoacuerdo">
			</div>
            <div class="form-group">
            	<label for="idexpediente">Empleado</label>
            	<select name="idexpediente" class="form-control" id="idexpediente">
	            	@foreach ($empleados as $emp)
	                        <option value="{{$emp->idexpediente}}">{{$emp->nombrecompleto}}</option>
	                @endforeach
            	</select>
            </div>
            <div class="form-group">
            	<label for="motivoacuerdo">Motivo</label>
            	<input type="text" name="motivoacuerdo" class="form-control" required value="{{old('motivoacuerdo')}}" placeholder="Escribir motivo..." id="motivoacuerdo">
            </div>
            <div class="form-group">
				<label for="descripcionacuerdo">Descripción</label>
				<textarea class="form-control" required value="{{old('descripcionacuerdo')}}" placeholder="Escribir descripción" name="descripcionacuerdo" id="descripcionacuerdo"></textarea>
			</div>
            <div class="form-group">
				<label for="fechaacuerdo">Fecha</label>
				<input name="fechaacuerdo" class="tcal form-control" required value="{{old('fechaacuerdo')}}" placeholder="00/00/0000" id="fechaacuerdo">
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>

                    {!!Form::close()!!}		

</div>
@endsection
