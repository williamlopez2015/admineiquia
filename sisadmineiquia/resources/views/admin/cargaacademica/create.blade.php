@extends('layouts.admin')
@section('contenido')
<div class="row">
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="/admin/cargaacademica">Administrar Carga Academica</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Nueva Carga Academica</li>
    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3> Carga Academica </h3>

	</div>
 </div>
 @include('mensajes.errores')
 <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      @include('mensajes.messages')
			{!!Form::open(array('url'=>'admin/cargaacademica','method'=>'POST','autocomplete'=>'off'))!!}
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
                  <label>Nombre de Ciclo</label>
                  <select name="idciclo" class="form-control" id="idciclo">
                   @foreach ($ciclos as $c)
                         <option value="{{$c->IDCICLO}}">{{$c->NOMBRECICLO}}</option>
                   @endforeach
                  </select>  
            </div>


			<div class="form-group">
            	<label for="anocarga">Año</label>
              <select name="anocarga" class="form-control" id="anocarga">
                @for($i=date('o'); $i>=1910; $i--)
                @if ($i == date('o'))
                <option value="{{$i}}" selected>{{$i}}</option>
                @else
                <option value="{{$i}}">{{$i}}</option>
                @endif
                @endfor
                </select>
            </div>
            <div class="form-group">
            	<label for="codigoasignatura">Codigo Asignatura</label>
            	<input type="text" name="codigoasignatura" value="{{old('codigoasignatura')}}" class="form-control" placeholder="Codigo Asignatura..." id="codigoasignatura" min="0" max="6">
            	<div id="mensaje1" class="errores">Codigo Invalido</div>
            </div>

             <div class="form-group">
            	<label for="nombreasignatura">Nombre Asignatura</label>
            	<input type="text" name="nombreasignatura" value="{{old('nombreasignatura')}}" class="form-control" placeholder="Nombre Asignatura..." id="nombreasignatura" onkeyup="corregirNombreAsignatura();">
            	<div id="mensaje1" class="errores">Nombre Invalido</div>
            </div>

            
			 
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		<div class="form-group">
            	<label for="grupoteorico">Grupo Teorico</label>
            	<input  name="grupoteorico" value="{{old('grupoteorico')}}" class="form-control" placeholder="Grupo Teorico..." id="grupoteorico" type="number" min="1" max="99" >
            	<div id="mensaje1" class="errores">Nombre invalido</div>
            </div>

            <div class="form-group">
            	<label for="grupodiscusion">Grupo Discusion</label>
            	<input  name="grupodiscusion" value="{{old('grupodiscusion')}}" class="form-control" placeholder="Grupo Discusion..." id="grupodiscusion" type="number" min="1" max="99" >
            	<div id="mensaje1" class="errores">Grupo invalido</div>
            </div>

            <div class="form-group">
            	<label for="grupolaboratorio">Grupo Laboratorio</label>
            	<input  name="grupolaboratorio" value="{{old('grupolaboratorio')}}" class="form-control" placeholder="Grupo Laboratorio..." id="grupolaboratorio" type="number" min="1" max="99">
            	<div id="mensaje1" class="errores">Grupo invalido</div>
            </div>


            <div class="form-group">
            	<label for="tiempototal">Tiempo Total</label>
            	<input  name="tiempototal" value="{{old('tiempototal')}}" class="form-control" placeholder="Tiempo Total..." id="tiempototal" type="number" min="1" max="150">
            	<div id="mensaje1" class="errores">Tiempo invalido</div>
            </div>

             <div class="form-group">
                <label>Responsabilidad Administrativas</label>
                <textarea  name="responsabilidadadministrativa" id="responsabilidadadministrativa" class="form-control"  rows="3" placeholder="Responsabilidad  Adaministrativas">{{old('responsabilidadadministrativa')}}</textarea>
            </div>

            <div class="form-group" align=right>
            	<button class="btn btn-primary" type="submit" >Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

		</div>
                    {!!Form::close()!!}		

</div>

@endsection