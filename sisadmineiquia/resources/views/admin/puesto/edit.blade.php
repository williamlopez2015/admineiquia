@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Puesto: {{$puesto->NOMBREPUESTO}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
                  

			{!!Form::model($puesto,['method'=>'PATCH','route'=>['admin.puesto.update',$puesto->IDPUESTO]])!!}
            {{Form::token()}}     

            <div class="form-group">
            	<label for="nombre">Nombre</label>
<<<<<<< HEAD
            	<input type="text" name="nombrepuesto" class="form-control" required value="{{$puesto->nombrepuesto}}" >
=======
            	<input type="text" name="nombrepuesto" required value="{{$puesto->NOMBREPUESTO}}" class="form-control">
>>>>>>> origin/wen
            </div>


            <div class="form-group">
                  <label> Departamento</label>
                  <select name="iddepartamento" class="form-control">
                   @foreach ($departamentos as $dep)
                         @if ($dep->iddepartamento==$puesto->IDDEPARTAMENTO)
                         <option value="{{$dep->iddepartamento}}" selected>{{$dep->nombredepartamento}}</option>
                         @else
                          <option value="{{$dep->iddepartamento}}">{{$dep->nombredepartamento}}</option>
                         @endif
                   @endforeach
                  </select>     
            </div>
            
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
<<<<<<< HEAD
            	<input type="text" name="descripcionpuesto" class="form-control" required value="{{$puesto->descripcionpuesto}}"  placeholder="Descripción Puesto...">
            </div>
            <div class="form-group">
            	<label for="salario">Salario</label>
            	<input type="text" name="salariopuesto" class="form-control" required value="{{$puesto->salariopuesto}}" >
=======
            	<input type="text" name="descripcionpuesto" required value="{{$puesto->DESCRIPCIONPUESTO}}" class="form-control" placeholder="Descripción Puesto...">
            </div>
            <div class="form-group">
            	<label for="salario">Salario</label>
            	<input type="text" name="salariopuesto" required value="{{$puesto->SALARIOPUESTO}}" class="form-control">
>>>>>>> origin/wen
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection