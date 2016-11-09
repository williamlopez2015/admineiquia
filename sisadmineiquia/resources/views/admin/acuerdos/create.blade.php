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
			{!!Form::open(array('url'=>'admin/acuerdos','method'=>'POST','autocomplete'=>'off','files'=>true,'id' => 'my-dropzone'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="idacuerdo">Código</label>
            	<input type="text" name="idacuerdo" class="form-control" required value="{{old('idacuerdo')}}" placeholder="AA0000000" id="codAcuerdo" onkeyup="corregirCodAcuerdo();">
            </div>
            <div class="form-group">
				<label for="foto">Documento</label>
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
            	<input type="text" name="motivoacuerdo" class="form-control" required value="{{old('motivoacuerdo')}}" placeholder="Escribir motivo..." id="motivoAcuerdo" onkeyup="corregirMotivoAcuerdo();">
            </div>
            <div class="form-group">
				<label for="descripcionacuerdo">Descripción</label>
				<input class="form-control" required value="{{old('descripcionacuerdo')}}" placeholder="Escribir descripción" name="descripcionacuerdo" id="descripcionAcuerdo" onkeyup="corregirDescripcionAcuerdo();"></input>
			</div>
            <div class="form-group">
				<label for="fechaacuerdo">Fecha</label>
				<input name="fechaacuerdo" class="tcal form-control" required value="{{old('fechaacuerdo')}}" placeholder="00-00-0000" id="fechaAcuerdo" onkeyup="corregirFechaAcuerdo();">
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="/admin/acuerdos" class="btn btn-danger" role="button">Cancelar</a>
            </div>
		</div>

                    {!!Form::close()!!}		

</div>
@endsection
