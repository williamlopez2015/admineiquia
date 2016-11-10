@extends('layouts.admin')
@section('contenido')
				<div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href="/admin/expedienteacademico">Administrar Expediente</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i>
                                Administrar Expediente Academico 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                <label><a href="expedienteacademico/create" class="btn btn-primary btn-lg" role="button"><i class="fa fa-plus"></i> Nuevo Expediente Academico</a></label>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-12">
                @include('mensajes.messages')
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado de Expedientes Academicos</h2>
                        <div class="table-responsive">    
                            <table class="table table-bordered table-hover" id="tablaexpacad">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Empleado</th>
                                        <th>Fecha Apertura</th>
                                        <th>Titulo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($expedienteacademicos as $expacad)
                                    <tr>
                                        <td>{{ $expacad->idexpedienteacadem}}</td>
                                        <td>{{ $expacad->nombrecompleto}}</td>
                                        <td>{{ $expacad->fechaaperturaexpacad}}</td>
                                        <td>{{ $expacad->tituloobtenido}}</td>
                                        <td>
                                        <a href="{{URL::action('ExpedienteAcademicoController@edit',$expacad->idempleado)}}"><button type="button" class="btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i> Editar</button></a>
                                        <a href="{{URL::action('ExpedienteAcademicoController@show',$expacad->idexpedienteacadem)}}"><button type="button" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-book"></i> Detalle</button></a>
                                        </td>
                                    </tr>
                                @endforeach 
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>    
@endsection