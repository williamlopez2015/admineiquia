@extends('layouts.admin')
@section('contenido')
				<div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href="/admin/expedienteacademico"> Administrar Empleados</a>
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
                <label><a href="expedienteacademico/create" class="btn btn-primary btn-lg" role="button">Expediente Academico</a></label>
               
                @include('mensajes.messages')
 
                 
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado de Expedientes Academicos</h2>
                        <div class="table-responsive">
                            
                            <table class="table table-bordered table-hover" id="tablaexpacad">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha Apertura</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($expedienteacademicos as $expacad)
                                    <tr>
                                        <td>{{ $expacad->IDEXPEDIENTEACADEM}}</td>
                                        <td>{{ $expacad->FECHAAPERTURAEXPACAD}}</td>
                                        <td>
                                        <a href="{{URL::action('ExpedienteAcademicoController@edit',$expacad->IDEXPEDIENTEACADEM)}}"><button type="button" class="btn btn-sm btn-primary">Editar Expediente Academico</button></a>
                                        


                                        </td>
                                    </tr>
                                @endforeach 
                                
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>    
@endsection