@extends ('layouts.admin')
@section ('contenido')
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
                <label><a href="puesto/create" class="btn btn-primary btn-lg" role="button">Nuevo Perfil</a></label>
                <!--
                @include('admin.empleado.search')
                -->
                
                @include('mensajes.messages')
                 </div>
                 
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Listado del Perfil de Puestos</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="tablaperfilpuesto">
				<thead>
					<th>Id</th>
					<th>Profesion</th>
					<th>Reporta A</th>
					<th>Sustituto</th>
					<th>Relaciones Internas</th>
					<th>Sustituye A</th>
				</thead>
               @foreach ($perfil as $per)
				<tr>
					<td>{{ $per->idperfilpuesto}}</td>
					<td>{{ $per->profesion}}</td>
					<td>{{ $per->sustituto}}</td>
				    <td>{{ $per->relaciones}}</td>
				    <td>{{ $per->sustituye}}</td>
					<td>
						<a href="{{URL::action('PerfilPuestoController@edit',$per->idperfilpuesto)}}"><button class="btn btn-xs btn-primary">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$per->idperfilpuesto}}" data-toggle="modal"><button class="btn btn-xs btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('admin.puesto.modal')
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection