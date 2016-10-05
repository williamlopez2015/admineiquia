@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Perfil de Puesto</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
       
			{!!Form::open(array('url'=>'admin/perfilpuesto','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}   

            <div class="form-group">
            	<label for="profesion">Profesion</label>
            	<input type="text" name="profesion" required value="{{old('profesion')}}" class="form-control" placeholder="Profesion...">
            </div>

            <div class="form-group">
            	<label for="reporta">Reporta a</label>
            	<input type="text" name="reporta" required value="{{old('reporta')}}" class="form-control" placeholder="Reporta a...">
            </div>
            
            <div class="form-group">
            	<label for="salario">Salario</label>
            	<input type="text" name="salariopuesto" required value="{{old('salariopuesto')}}" class="form-control" placeholder="Salrio Puesto...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection