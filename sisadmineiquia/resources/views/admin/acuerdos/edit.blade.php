@extends('layouts.admin')
@section('contenido')
<div class="row">
      <div class="col-lg-12">
            <ol class="breadcrumb">
                  <li> <i class="fa fa-home"></i> <a href="/admin/acuerdos"> Administrar Acuerdos Administrativos</a>
                  </li>
                  <li class="active">
                  <i class="fa fa-desktop"></i>Editar Acuerdo Administrativo</li>
            </ol>
      </div>
 </div>
 <div class="row">
      <div class="col-lg-12">
            <h3>Editar Acuerdo Administrativo</h3>
      </div>
 </div>
@include('mensajes.errores')
 <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      @include('mensajes.messages')
            {!!Form::model($acuerdos,['method'=>'PATCH','route'=>['admin.acuerdos.update',$acuerdos->IDACUERDO],'files'=>true])!!}

            {{Form::token()}}
            
            <div class="form-group">
                  <label for="idacuerdo">Código</label>
                  <input type="text" name="idacuerdo" class="form-control" required value="{{$acuerdos->IDACUERDO}}" id="idacuerdo" readonly="readonly">
            </div> 
            <div class="form-group">
                  <label for="foto"> Documento Acuerdo Administrativo</label>
                  <input type="file"  class="form-control" name="archivoacuerdo">
                        @if(($acuerdos->archivoacuerdo)!=" ")
                              <img class="img-thumbnail" src="{{asset('acuerdos/'.$acuerdos->ARCHIVOACUERDO)}}" alt="{{$acuerdos->IDACUERDO}}" height="110px" width="110px">
                        @endif
            </div>
            <div class="form-group">
                  <label for="idexpediente">Empleado</label>
                  <select name="idexpediente" class="form-control" id="idexpediente">
                        @foreach ($empleados as $emp)
                              <option required value="{{$emp->idexpediente}}">{{$emp->nombrecompleto}}</option>
                        @endforeach
                  </select>
            </div>
            <div class="form-group">
                  <label for="motivoacuerdo">Motivo</label>
                  <input type="text" name="motivoacuerdo" class="form-control" required value="{{$acuerdos->MOTIVOACUERDO}}" id="motivoacuerdo">
            </div>
             <div class="form-group">
                  <label for="descripcionacuerdo">Descripción</label>
                  <input class="form-control" name="descripcionacuerdo" class="form-control" required value="{{$acuerdos->DESCRIPCIONACUERDO}}" id="descripcionacuerdo">
            </div>
            <div class="form-group">
                  <label for="fechaacuerdo">Fecha</label>
                  <input name="fechaacuerdo" class="tcal form-control" required value="{{$acuerdos->FECHAACUERDO}}" id="fechaacuerdo">
            </div>
            <div class="form-Sroup">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
      </div>
                  {!!Form::close()!!}           

</div>



@endsection