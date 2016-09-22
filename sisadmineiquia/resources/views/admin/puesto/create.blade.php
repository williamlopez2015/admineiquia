@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Puesto</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
       
			{!!Form::open(array('url'=>'admin/puesto','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}   

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombrepuesto" required value="{{old('nombrepuesto')}}" class="form-control" placeholder="Nombre Puesto...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcionpuesto" required value="{{old('descripcionpuesto')}}" class="form-control" placeholder="Descripción Puesto...">
            </div>
            <div class="form-group">
            	<label for="salario">Salario</label>
            	<input type="text" name="salariopuesto" required value="{{old('salariopuesto')}}" class="form-control" placeholder="Salrio Puesto...">
            </div>

            <div class="form-group">
                  <label> Departamento</label>
                  <select name="iddepartamento" class="form-control">
                   @foreach ($departamentos as $dep)
                         <option value="{{$dep->iddepartamento}}">{{$dep->nombredepartamento}}</option>
                   @endforeach
                  </select>     
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection