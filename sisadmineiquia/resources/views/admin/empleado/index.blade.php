@extends('layouts.admin')
@section('contenido')
				<div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href="empleado/"> Administrar Empleados</a>
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
                <label><a href="empleado/create/" class="btn btn-primary btn-lg" role="button">Nuevo Empleado</a></label>
                @include('admin.empleado.search')
                 </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado de Empleados</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Dui</th>
                                        <th>Nit</th>
                                        <th>Estado</th>
                                        <th>Cambiar Estado</th>
                                        <th>Editar</th>
                                        <th>Ficha Resumen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($empleados as $emp)
                                    <tr>
                                    	<td>{{ $emp->IDEMPLEADO }}</td>
                                        <td>{{ $emp->FOTO }}</td>
                                        <td>{{ $emp->PRIMERNOMBRE }}</td>
                                        <td>{{ $emp->DUI }}</td>
                                        <td>{{ $emp->NIT }}</td>
                                        <td>{{ $emp->ESTADO }}</td>
                                        <td>
                                		<a href="" data-target="#modal-delete-{{ $emp->IDEMPLEADO}}" data-toggle="modal"><button  class="btn btn-sm btn-success">Cambiar</button></a></td>
                                        <td><a href="{{URL::action('EmpleadoController@edit',$emp->IDEMPLEADO)}}"><button type="button" class="btn btn-sm btn-primary">Editar</button></a></td>
                                        <td>
<button type="button" class="btn btn-sm btn-danger">Ficha</button></a></td>
                                    </tr>
                                    @include('admin.empleado.modal')
                                @endforeach 
                                 
                                
                                </tbody>
                            </table>
                        </div>
                        {{$empleados->render()}}
                        @foreach ($errors as $e)
                        <h1>{{$e}}</h1>
                        @endforeach
                        
                    </div>
                 
@endsection