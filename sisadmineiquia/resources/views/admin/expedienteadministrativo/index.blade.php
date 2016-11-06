@extends('layouts.admin')
@section('contenido')
				<div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href="/admin/empleado"> Administrar Empleados</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i>
                                Gestion General de Expedientes Administrativos
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                <label><a href="expedienteadministrativo/create" class="btn btn-primary btn-lg" role="button">Nuevo Expediente Administrativo</a></label>
                <!--
                @include('admin.empleado.search')-->
                @include('mensajes.messages')
 
                 
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado de Expedientes</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tablaexpadmin">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Empleado</th>
                                        <th>Fecha Apertura</th>
                                        <th>Puesto</th>
                                        <th>Tiempo Integral</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($expedienteadministrativos as $exp)
                                    <tr>
                                    	<td>{{ $exp->idexpediente}}</td>
                                        <td>{{ $exp->nombrecompleto}}</td>
                                        <td>{{ $exp->fechaapertura}}</td>
                                        <td>{{ $exp->nombrepuesto}}</td>
                                        <td>{{ $exp->tiempointegral}}</td>
                                        <td>
                                        <a href="{{URL::action('ExpedienteAdministrativoController@edit',$exp->idempleado)}}"><button type="button" class="btn btn-xs btn-info">Editar Expediente Administrativo</button></a>
                                        <a href="{{URL::action('ExpedienteAdministrativoController@show',$exp->idexpediente)}}"><button class="btn btn-xs btn-success">Detalle</button></a>
                                        <a href="{{URL::action('EmpleadoController@perfilreport',$exp->idempleado)}}"><button class="btn btn-xs btn-success">Perfil</button></a>
                                        </td>
                                    </tr>
                                @endforeach 
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>    
@endsection