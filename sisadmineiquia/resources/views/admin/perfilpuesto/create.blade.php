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
            </div>
      </div>
			{!!Form::open(array('url'=>'admin/perfilpuesto','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-group">
                        <label for="profesion">Profesion</label>
                        <input type="text" name="profesion" required value="{{old('profesion')}}" class="form-control" placeholder="Profesion...">
                  </div>

                  <div class="form-group">
                        <label for="reporta">Reporta a</label>
                        <input type="text" name="reporta" required value="{{old('reporta')}}" class="form-control" placeholder="Reporta a...">
                  </div>
            
                  <div class="form-group">
                        <label for="sustituto">Sustituto</label>
                        <input type="text" name="sustituto" required value="{{old('sustituto')}}" class="form-control" placeholder="Sustituto...">
                  </div>

                  <div class="form-group">
                        <label for="relaciones">Relaciones Internas</label>
                        <input type="text" name="relaciones" required value="{{old('relaciones')}}" class="form-control" placeholder="Relaciones Internas...">
                  </div>
              </div>

               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-group">
                        <label for="sustituye">Sustituye a</label>
                        <input type="text" name="sustituye" required value="{{old('sustituye')}}" class="form-control" placeholder="Sustituye a...">
                  </div>
                  <div class="form-group">
                     <label for="responsabilidades">Responsabilidades Principales</label>
                     <textarea  type="text" name="responsabilidades" required value="{{old('responsabilidades')}}" class="form-control"  rows="3"  placeholder="Responsabilidades Principales..."></textarea>
                  </div>

                  <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                  </div>

                </div>

            </div> 

      {!!Form::close()!!}           
               
@endsection