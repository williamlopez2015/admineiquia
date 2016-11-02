@extends('layouts.admin')
@section('contenido')
 <div class="row">
    <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="/admin/permiso"> Gestionar Permisos</a></li>
        <li class="active"><i class="fa fa-desktop"></i> Nuevo Permiso</li>
      </ol>
    </div>
 </div>
 
 <div class="row">
    <div class="col-lg-12">
       <h3>Solicitud de Permiso</h3>
    </div>
    
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
 </div>

 {!!Form::open(array('url'=>'admin/permiso','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}


	<div class="row col-xs-10">
    <div class="panel panel-primary">
      <div class="panel-body">

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
              <label for="cargodocente">Cargo Docente</label>
              <input type="text" name="cargodocente" value="{{old('cargodocente')}}" class="form-control" placeholder="Cargo Docente...">
            </div>

            <div class="form-group">
              <label for="numerotarjeta">Numero Tarjeta</label>
              <input type="text" name="numerotarjeta" value="{{old('numerotarjeta')}}" class="form-control" placeholder="Numero Tarjetaa...">
            </div>
          </div>
      </div>

        <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="empleado"> Empleado </label>
              <select name="idexpediente" class="form-control selectpicker" id="idexpediente" class="form-control" data-live-search="true">
                  @foreach ($empleados as $emp)
                    <option value="{{$emp->idexpediente}}">{{$emp->nombre}}</option>
                  @endforeach
              </select>     
            </div>
    
            <div class="form-group">
              <label for="tiemposolicitado">Tiempo solicitado</label>
              <input type="text" name="tiemposolicitado"  required value="{{old('tiemposolicitado')}}" class="form-control" placeholder="Tiempo...">
            </div>
          </div>
      
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="fechasolicitud">Fecha Solucitud</label>
              <input type="text" name="fechasolicitud" class="tcal form-control" required value="{{old('fechasolicitud')}}" class="form-control" >
            </div>

          <div class="form-group">
              <label for="motivopermiso">Motivo</label>
              <textarea type="text" name="motivopermiso" required value="{{old('motivopermiso')}}" class="form-control"  rows=""  placeholder="Motivo del Permiso..."></textarea>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <div class="row col-xs-10">
    <div class="panel panel-primary">
      <div class="panel-body">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="estadopermiso">Estado</label>
                <select name="estadopermiso" class="form-control">    
                  <option value="0">En espera</option>
                  <option value="1">Aprobado</option>
                  <option value="2">Denegado</option>
                </select>     
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="gocesueldo">Goce de Sueldo </label>
                <select name="gocesueldo" id="gocesueldo" class="form-control">    
                  <option value="0">Sin contestar</option>
                  <option value="1">Si</option>
                  <option value="2">No</option>
                </select>     
              </div>
            </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label for="fechapermiso">Fecha Ingreso</label>
              <input type="text" name="fechapermiso" class="tcal form-control" required value="{{old('fechapermiso')}}" class="form-control" >
            </div>
          </div>
      </div>
    </div>
  </div>
    <div class="row">
		  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
    </div>

{!!Form::close()!!}	

@push('scripts')
<script>


</script>
@endpush
@endsection