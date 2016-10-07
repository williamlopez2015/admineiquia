@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Perfil del Puesto: {{$perfil->PROFESION}}</h3>
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
                  

			{!!Form::model($perfil,['method'=>'PATCH','route'=>['admin.perfilpuesto.update',$perfil->IDPERFILPUESTO]])!!}
            {{Form::token()}} 

             <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">    

                  <div class="form-group">
            	     <label for="profesion">Profesion</label>
            	     <input type="text" name="profesion" required value="{{$perfil->PROFESION}}" class="form-control">
                  </div>

            
                  <div class="form-group">
            	     <label for="reporta">Reporta a</label>
            	     <input type="text" name="reporta" required value="{{$perfil->REPORTA}}" class="form-control">
                  </div>

                  <div class="form-group">
                        <label for="sustituto">Sustituto</label>
                        <input type="text" name="sustituto" required value="{{$perfil->SUSTITUTO}}" class="form-control">
                  </div>

                  <div class="form-group">
            	     <label for="relaciones">Relaciones Internas</label>
            	     <input type="text" name="relaciones" required value="{{$perfil->RELACIONES}}" class="form-control">
                  </div>

               </div>

               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  

                  <div class="form-group">
                        <label for="sustituye">Sustituye a</label>
                        <input type="text" name="sustituye" required value="{{$perfil->SUSTITUYE}}" class="form-control">
                  </div>

                  <div class="form-group">
                        <label for="responsabilidades">Responsabilidades Principales</label>
                        <input type="text" name="responsabilidades" required value="{{$perfil->RESPONSABILIDADES}}" class="form-control">
                  </div>


                  <div class="form-group">
            	     <button class="btn btn-primary" type="submit">Guardar</button>
            	     <button class="btn btn-danger" type="reset">Cancelar</button>
                  </div>
               </div>
             </div>     

		{!!Form::close()!!}		
            
		
@endsection