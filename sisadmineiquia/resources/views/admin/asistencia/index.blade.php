@extends ('layouts.admin')
@section ('contenido')
<div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i> <a href="/admin/asistencia"> Gestionar asistencia</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i>
                                Gestion de Asistencia
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
                <label><a href="asistencia/create" class="btn btn-primary btn-lg" role="button">Nueva Aistencia</a></label>
                <!--
                @include('admin.empleado.search')
                -->
                
                @include('mensajes.messages')
                 </div>
                 
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado de Asistencias</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-8 col-md-12 col-sm-6 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="tablaasistencia">
				<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>Turno</th>
					<th>Opciones</th>
				</thead>
               @foreach ($asistencias as $asis)
				<tr>
					<td>{{ $asis->idasistencia}}</td>
					<td>{{ $asis->fechaasistencia}}</td>
                    @if($asis->turno=='0')
					   <td>Mañana</td>
                      @else 
                       <td>Tarde</td>
                    @endif
					<td>
						<a href="{{URL::action('AsistenciaController@show',$asis->idasistencia)}}"><button class="btn btn-xs btn-primary">Detalles</button></a>
                        <a href="{{URL::action('AsistenciaController@edit',$asis->idasistencia)}}"><button class="btn btn-xs btn-primary">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$asis->idasistencia}}" data-toggle="modal"><button class="btn btn-xs btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('admin.asistencia.modal')
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection