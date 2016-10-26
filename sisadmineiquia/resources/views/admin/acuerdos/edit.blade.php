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
            <h3>Editar Acuerdo Administrativo: {{$acuerdos->IDACUERDO}}</h3>
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

            {!!Form::model($acuerdos,['method'=>'PATCH','route'=>['admin.acuerdos.update',$acuerdos->IDACUERDO]])!!}

            {{Form::token()}}

            <div class="form-group">
                  <label for="idacuerdo">Código:</label>
                  <input type="text" name="idacuerdo" class="form-control" value="{{$acuerdos->IDACUERDO}}" id="idacuerdo">
            </div> 
            <div class="form-group">
                  <label for="idexpediente">Empleado:</label>
                  <input type="text" name="idexpediente" class="form-control" value="{{$acuerdos->IDEXPEDIENTE}}"
                  id="idexpediente">
                  <select name="idexpediente" class="form-control" id="idexpediente">
                  </select>
            </div>
            <div class="form-group">
                  <label for="motivoacuerdo">Motivo:</label>
                  <input type="text" name="motivoacuerdo" class="form-control" value="{{$acuerdos->MOTIVOACUERDO}}" id="motivoacuerdo">
            </div>
             <div class="form-group">
                  <label for="descripcionacuerdo">Descripción:</label>
                  <input class="form-control" name="descripcionacuerdo" class="form-control" value="{{$acuerdos->DESCRIPCIONACUERDO}}" id="descripcionacuerdo">
            </div>
            <div class="form-group">
                  <label for="estadoacuerdo">Estado:</label>
                  <input type="textarea" name="estadoacuerdo" class="form-control" value="{{$acuerdos->ESTADOACUERDO}}" id="estadoacuerdo">
            </div>
            <div class="form-group">
                  <label for="fechaacuerdo">Fecha:</label>
                  <input class="form-control" name="fechaacuerdo" class="form-control" value="{{$acuerdos->FECHAACUERDO}}" id="fechaacuerdo">
            </div>
            <div class="form-Sroup">
                  <button class="btn btn-primary" type="submit" id="guardar">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
      </div>
                  {!!Form::close()!!}           

</div>



@endsection