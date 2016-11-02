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
 </div>
  @include('mensajes.errores')
<div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         @include('mensajes.messages')
      </div>
</div>
  @foreach ($permiso as $per)         
  @endforeach
  {!!Form::model($permiso,['method'=>'PATCH','route'=>['admin.permiso.update',$per->idpermiso]])!!}
  {{Form::token()}}          
  <div class="row col-xs-10">
    <div class="panel panel-primary">
      <div class="panel-body">

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
              <label for="cargodocente">Cargo Docente</label>
              <input type="text" name="cargodocente" value="{{$per->cargodocente}}" value="{{old('cargodocente')}}" class="form-control">
            </div>

            <div class="form-group">
              <label for="numerotarjeta">Numero Tarjeta</label>
              <input type="text" name="numerotarjeta" value="{{$per->numerotarjeta}}" value="{{old('numerotarjeta')}}" class="form-control" >
            </div>
          </div>
      </div>

        <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="empleado"> Empleado </label>
              <select name="idempleado" class="form-control selectpicker" id="idempleado" class="form-control" data-live-search="true">
                  @foreach ($permiso as $per)
                    <option value="{{$per->idempleado}}">{{$per->nombre}}</option>
                  @endforeach
              </select>     
            </div>
    
            <div class="form-group">
              <label for="tiemposolicitado">Tiempo solicitado</label>
              <input type="text" name="tiemposolicitado"  required value="{{$per->tiemposolicitado}}" value="{{old('tiemposolicitado')}}" class="form-control" >
            </div>
          </div>
      
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="fechasolicitud">Fecha Solucitud</label>
              <input type="text" name="fechasolicitud" class="tcal form-control" required value="{{$per->fechasolicitud}}" value="{{old('fechasolicitud')}}" class="form-control" >
            </div>

            <div class="form-group">
              <label for="motivopermiso">Motivo</label>
              <textarea type="text" name="motivopermiso" required value="{{$per->motivopermiso}}" value="{{old('motivopermiso')}}" class="form-control"  rows="">{{$per->motivopermiso}}</textarea>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <div class="form-group">
                <input type="hidden" name="idexpediente" value="{{$per->idexpediente}}" class="form-control">
              </div>
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
                  @if($per->gocesueldo==0)
                    <option value="0" selected>En espera</option>
                    <option value="1" >Aprobado</option>
                    <option value="2" >Denegado</option>
                  @else @if($per->gocesueldo==1)
                     <option value="0" >En espera</option>
                     <option value="1" selected>Aprobado</option>
                     <option value="2" >Denegado</option>
                        @else
                        <option value="0" >En espera</option>
                        <option value="1" >Aprobado</option>
                        <option value="2" selected>Denegado</option>
                        @endif
                  @endif     
                </select>     
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <label for="gocesueldo">Goce de Sueldo </label>
                <select name="gocesueldo" id="gocesueldo" class="form-control">
                  @if($per->gocesueldo==0)
                    <option value="0" selected>Sin contestar</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                  @else @if($per->gocesueldo==1)
                    <option value="0">Sin contestar</option>
                    <option value="1" selected>Si</option>
                    <option value="2">No</option>
                        @else
                        <option value="0">Sin contestar</option>
                        <option value="1">Si</option>
                        <option value="2" selected>No</option>
                        @endif
                  @endif
                </select>     
              </div>
            </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="form-group">
              <label for="fechapermiso">Fecha Ingreso</label>
              <input type="text" name="fechapermiso" class="tcal form-control" required value="{{$per->fechapermiso}}" value="{{old('fechapermiso')}}" class="form-control" >
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
            
@endsection