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
                                Gestion General de los empleados
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                <label><a href="empleado/create" class="btn btn-primary btn-lg" role="button">Nuevo Empleado</a></label>
                <label><a href="expedienteadministrativo/create" class="btn btn-primary btn-lg" role="button">Expediente Administrativo</a></label>
                <!--
                @include('admin.empleado.search')-->
                @include('mensajes.messages')
            
                 </div>
                 
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado de Empleados</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tablaempleado">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Dui</th>
                                        <th>Nit</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($empleados as $emp)
                                    <tr>
                                    	<td>{{ $emp->idempleado }}</td>
                                        <td>
                                            <img src="{{asset('fotos/empleados/'.$emp->foto)}}" alt="{{$emp->nombrecompleto}}" height="110px" width="110px" class="img-thumbnail">

                                        </td>
                                        <td>{{ $emp->nombrecompleto }}</td>
                                        <td>{{ $emp->dui}}</td>
                                        <td>{{ $emp->nit }}</td>
                                        <td>{{ $emp->estado }}</td>
                                        <td>
                                        <a href="" data-target="#modal-delete-{{$emp->idempleado}}" data-toggle="modal"><button  class="btn btn-xs btn-danger">Cambiar</button></a>
                                        <a href="{{URL::action('EmpleadoController@edit',$emp->idempleado)}}"><button type="button" class="btn btn-xs btn-primary">Editar</button></a>
                                        <!--<a href=""><button type="button" class="btn btn-sm btn-info">Ficha</button></a></td>-->
                                        <a href="{{URL::action('ExpedienteAdministrativoController@edit',$emp->idempleado)}}"><button type="button" class="btn btn-xs btn-info">Expediente Administrativo</button></a>
                                        </td>
                                    </tr>
                                    @include('admin.empleado.modal')
                                @endforeach 
                                </tbody>
                            </table>
                        </div>   
                    </div>    
@endsection