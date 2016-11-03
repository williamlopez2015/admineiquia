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
                                Gestion de Empleados
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                <label><a href="/admin/expedienteadministrativo" class="btn btn-primary btn-lg" role="button">Expediente Administrativo</a></label>
                <label><a href="/admin/expedienteacademico" class="btn btn-primary btn-lg" role="button">Expediente Academico</a></label>
                </div>
                <div class="row">
                <div class="col-lg-12">
                @include('mensajes.messages')
                </div>
                </div>
                
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h1>Listado de Empleados</h1></div>

                            </div>
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="empleado/create"><button class="btn btn-success">Agregar Nuevo <i class="fa fa-plus"></i></button></a>
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="empleado/nominareport">Generar Nomina Como PDF</a></li>
                                            <li><a href="empleado/nominareportdownload">Descargar Nomina Como PDF</a></li>
                                         </ul>
                                      </div>
                                   </div>
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
                                                    @if($emp->estado=='1')
                                                    <td>Activo</td>
                                                    @else
                                                     <td>De Baja</td>
                                                    @endif
                                                    <td>
                                                    <a href="" data-target="#modal-delete-{{$emp->idempleado}}" data-toggle="modal"><button  class="btn btn-xs btn-danger">Cambiar</button></a>
                                                    <a href="{{URL::action('EmpleadoController@edit',$emp->idempleado)}}"><button type="button" class="btn btn-xs btn-primary">Editar</button></a>
                                                    <a href="{{URL::action('EmpleadoController@perfilreport',$emp->idempleado)}}"><button class="btn btn-xs btn-success">Perfil</button></a>
                                                    </td>
                                                </tr>
                                                @include('admin.empleado.modal')
                                            @endforeach 
                                            </tbody>
                                        </table>
                                </div>
                        </div>   
                    </div>
                    </div>     
@endsection