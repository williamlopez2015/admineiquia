@extends('layouts.admin')
@section('contenido')

                 <!--Contenido -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="/home">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Pagina Principal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron">
                    <h1>¡Bienvenido!</h1>
                    <p>Este es sistema informático para la gestión de expedientes académicos-administrativos del recurso humano de EIQUIA-FIA-UES.</p>
                    <p>
                    </p>
                </div>
                 <div class="page-header">
                    <h1>Descripción</h1>
                </div>
                <div class="row">
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title">Control de Empleados</h3>
                            </div>
                            <div class="panel-body">
                                Adminitracion de Expediente de los Empleados.
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title">Control de Asistencie</h3>
                            </div>
                            <div class="panel-body">
                                Administrar el registro de asistencia y permisos de los empleados.
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title">Reportes</h3>
                            </div>
                            <div class="panel-body">
                                Reportes Sencillos y facil de generar.
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                </div>


               
               
                <div class="page-header">
                    <h1>Informacion General</h1>
                </div>
                <div class="well">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
@endsection