@extends ('layouts.admin')
@section ('contenido')
<div class="row">
   <div class="col-lg-12">
       <ol class="breadcrumb">
          <li><i class="fa fa-home"></i> <a href="/admin/puesto"> Gestionar Puesto</a></li>
          <li class="active"><i class="fa fa-desktop"></i> Gestion General de los Puestos</li>
       </ol>
    </div>
</div>
               
  <div class="col-lg-12">
  	 <label><a href="puesto/create" class="btn btn-primary btn-lg" role="button">Nuevo Puesto</a></label>
     @include('mensajes.messages')
  </div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h2>Listado de Puesto</h2>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="tablapuesto">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Departamento</th>
					<th>Descripción</th>
					<th>Profesion</th>
					<th>Reporta a:</th>
					<th>Opciones</th>
				</thead>
               @foreach ($puestos as $pues)
				<tr>
					<td>{{ $pues->idpuesto}}</td>
					<td>{{ $pues->nombrepuesto}}</td>
					<td>{{ $pues->departamento}}</td>
					<td>{{ $pues->descripcionpuesto}}</td>
				    <td>{{ $pues->profesion}}</td>
				    <td>{{ $pues->reporta}}</td>
					<td>
						<a href="{{URL::action('PuestoController@edit',$pues->idpuesto)}}"><button class="btn btn-xs btn-primary">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$pues->idpuesto}}" data-toggle="modal"><button class="btn btn-xs btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('admin.puesto.modal')
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection