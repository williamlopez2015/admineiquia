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
                            <th>Archivo</th>
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
                                <td>{{ $ac->idacuerdo }}</td>
                                <td>
                                @if(($ac->archivoacuerdo)!="")
                                    <a href="{{ URL::asset('acuerdos/'.$ac->archivoacuerdo) }}" target="_blank">
                                        {{ $ac->idacuerdo }}
                                    </a>
                                @endif
                                </td>
                                <td>{{ $ac->nombrecompleto }}</td>
                                <td>{{ $ac->motivoacuerdo }}</td>
                                @if($ac->estadoacuerdo=='1')
                                                    <td>Aprobado</td>
                                                    @else
                                                     <td>No Aprobado</td>
                                                    @endif
                                <td>{{ $ac->fechaacuerdo }}</td>
                                <td>
                                    <a href="" data-target="#modal-delete2-{{$ac->idacuerdo}}" data-toggle="modal"><button  class="btn btn-sm btn-success">Cambiar Estado</button></a>
                                    <a href="{{URL::action('AcuerdosController@edit',$ac->idacuerdo)}}"><button type="button" class="btn btn-sm btn-primary">Editar</button></a>
                                    <a href="" data-target="#modal-delete-{{$ac->idacuerdo}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
                                @include('admin.acuerdos.modal')
                        @endforeach 
                    </tbody>
                </table>
            </div>
            {{$acuerdos->render()}}    
        </div>    
@endsection