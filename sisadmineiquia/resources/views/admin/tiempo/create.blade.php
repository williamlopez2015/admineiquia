@extends('layouts.admin')
@section('contenido')
<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="/admin/empleado"> Administrar Empleados</a>
      </li>
      <li class="active">
        <i class="fa fa-desktop"></i> Crear Tiempo Adicional</li>
      </ol>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <h3>Nuevo Tiempo Adicional</h3>
  </div>
</div>
@include('mensajes.errores')
 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			{!!Form::open(array('url'=>'admin/tiempo','method'=>'POST','autocomplete'=>'off','files'=>true))!!}
            {{Form::token()}}
        @include('mensajes.messages')
        	<div class="form-group">
                  <label>Empleado</label>
                  <select name="idempleado" class="form-control" id="idempleado">
                   @foreach ($empleados as $emp)
                         <option value="{{$emp->idempleado}}">{{$emp->nombrecompleto}}</option>
                   @endforeach
                  </select>       
            </div>
            <div class="form-group">
                  <label>Codigo Ciclo</label>
                  <select name="idciclo" class="form-control" id="idciclo">
                   @foreach ($ciclos as $c)
                         <option value="{{$c->IDCICLO}}">{{$c->NOMBRECICLO}}</option>
                   @endforeach
                  </select>  
            </div>
            <div class="form-group">
                <label>Tiempo Adicional Inicio:</label>
                <input  type="text" name="tiempoadicionalinicio" id="tiempoadicionalinicio" class="tcal form-control" value="{{old('tiempoadicionalinicio')}}" placeholder="00/00/0000" id="tiempoadicionalinicio">
            </div>
            <div class="form-group">
                <label>Tiempo Adicional Fin:</label>
                <input type='text' name="tiempoadicionalfin" id="tiempoadicionalfin" class="tcal form-control" value="{{old('tiempoadicionalfin')}}" placeholder="00/00/0000" id="tiempoadicionalfin"/>
            </div>
                    
            <div class="form-group">
                <label>Descripcion</label>
                <textarea  name="descripcion" id="descripcion" class="form-control"  rows="3" placeholder="Descripcion de el Tiempo Adicional">{{old('descripcion')}}</textarea>
            </div>
            <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>            
 </div>
                    {!!Form::close()!!}		

@endsection
