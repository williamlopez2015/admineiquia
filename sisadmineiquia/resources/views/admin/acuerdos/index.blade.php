@extends('layouts.admin')
@section('contenido')
	
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i> <a href="/admin/acuerdos"> Administrar Acuerdos Administrativos</a>
                </li>
                <li class="active">
                    <i class="fa fa-desktop"></i>Gestion General de los Acuerdos Administrativos
                </li>
            </ol>
        </div>
    </div>

    <div class="col-lg-12">
        <label><a href="acuerdos/create" class="btn btn-primary btn-lg" role="button">Nuevo Acuerdo Administrativo</a></label>
        <label><a href="expedienteadministrativo/create" class="btn btn-primary btn-lg" role="button">Expediente Administrativo</a></label>
                <!--
        @include('admin.acuerdos.search')
                -->
        @include('mensajes.messages') 

    </div>
                 
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>Listado de Acuerdos Administrativos</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tablaacuerdos">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Empleado</th>
                            <th>Motivo</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acuerdos as $ac)
                            <tr>
                                <td>{{ $ac->IDACUERDO }}</td>
                                <td>{{ $ac->IDEXPEDIENTE }}</td>
                                <td>{{ $ac->MOTIVOACUERDO }}</td>
                                <td>{{ $ac->ESTADOACUERDO }}</td>
                                <td>{{ $ac->FECHAACUERDO }}</td>
                                <td>
                                    <a href="{{URL::action('AcuerdosController@edit',$ac->IDACUERDO)}}"><button type="button" class="btn btn-sm btn-primary">Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$ac->IDACUERDO}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                                @include('admin.acuerdos.modal')
                        @endforeach 
                    </tbody>
                </table>
            </div>
            {{$acuerdos->render()}}    
        </div>    
@endsection