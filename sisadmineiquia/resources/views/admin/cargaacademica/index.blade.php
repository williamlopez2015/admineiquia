@extends('layouts.admin')
@section('contenido')
				<div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href="/admin/cargaacademica"> Administrar Carga Academica</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i>
                                Gestion General de Carga Academica
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                <label><a href="cargaacademica/create" class="btn btn-primary btn-lg" role="button">Nueva Carga Academica</a></label>

                <!--
                @include('admin.empleado.search')-->
                @include('mensajes.messages')
 
                 
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado de Carga Academica</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tablaexpadmin">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre Asignatura</th>
                                        <th>AÑO</th>
                                        <th>OPCIONES</th>
                                
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($cargaacademicas as $cargaacad)
                                    <tr>
                                    	<td>{{ $cargaacad->IDASIGNACIONACAD}}</td>
                                        <td>{{ $cargaacad->NOMBREASIGNATURA}}</td>
                                        <td>{{ $cargaacad->ANO}}</td>
                                        <td>
                                     <a href="{{URL::action('AsignacionAcademicaController@edit',$cargaacad->IDASIGNACIONACAD)}}"><button type="button" class="btn btn-sm btn-primary">Editar Carga Academica</button></a>
                                        </td>
                                    </tr>
                                @endforeach 
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>    
@endsection