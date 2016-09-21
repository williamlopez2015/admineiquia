@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12">
	<ol class="breadcrumb">
		<li> <i class="fa fa-home"></i> <a href="empleado/"> Administrar Empleados</a>
		</li>
 		<li class="active">
 		<i class="fa fa-desktop"></i> Crear Empleado</li>
    </ol>
	</div>
 </div>
 <div class="row">
	<div class="col-lg-12">
			<h3>Nuevo Empleado</h3>
	</div>
 </div>
 <div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(array('url'=>'admin/empleado','method'=>'POST','autocomplete'=>'off','onsubmit'=>'return ValidarDatos();'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="foto">Foto</label>
            	<input type="file" name="foto">
            </div>
            <div class="form-group">
            	<label for="primernombre">Primer Nombre</label>
            	<input type="text" name="primernombre" class="form-control" placeholder="Primer Nombre..." id="primernombre" onkeyup="corregirPrimerNombre();">
            	<div id="mensaje1" class="errores">Nombre invalido</div>
            </div>
            <div class="form-group">
            	<label for="segundonombre">Segundo Nombre</label>
            	<input type="text" name="segundonombre" class="form-control" placeholder="Segundo Nombre..." id="segundonombre" onkeyup="corregirSegundoNombre();">
            	<div id="mensaje2" class="errores">Nombre invalido</div>
            </div>
            <div class="form-group">
            	<label for="primerapellido">Primer Apellido</label>
            	<input type="text" name="primerapellido" class="form-control" placeholder="Primer Apellido..." id="primerapellido" onkeyup="corregirPrimerApellido();">
            	<div id="mensaje3" class="errores">Apellido invalido</div>
            </div>
            <div class="form-group">
            	<label for="segundoapellido">Segundo Apellido</label>
            	<input type="text" name="segundoapellido" class="form-control" placeholder="Segundo Apellido..." id="segundoapellido" onkeyup="corregirSegundoApellido();">
            	<div id="mensaje4" class="errores">Apellido invalido</div>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" id="guardar">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">     
			<div class="form-group">
				<label>Documento Unico de Identidad</label>
				<input class="form-control" name="dui" class="form-control" placeholder="00000000-0" id="dui" onkeyup="corregirDui();">
				<div id="mensaje5" class="errores">DUI invalido</div>
			</div>
			<div class="form-group">
				<label>Numero de Identificacion Tributaria</label>
				<input class="form-control" name="nit" class="form-control" placeholder="0000-000000-000-0" id="nit" onkeyup="corregirNit();">
				<div id="mensaje6" class="errores">NIT invalido</div>
			</div>
			<div class="form-group">
				<label>Numero del Seguro Social</label>
				<input class="form-control" name="isss" class="form-control" placeholder="000000000" id="isss" onkeyup="corregirIsss();">
				<div id="mensaje7" class="errores">No. ISSS invalido</div>
			</div>
			<div class="form-group">
				<label>Numero de AFP</label>
				<input class="form-control" name="afp" class="form-control" placeholder="000000000000" id="nup" onkeyup="corregirNup();">
				<div id="mensaje8" class="errores">No. AFP invalido</div>
			</div>                                  
		</div>

                    {!!Form::close()!!}		

</div>

<script type="text/javascript">
	var primernombre=document.getElementById("primernombre");
	var segundonombre = document.getElementById("segundonombre");
	var primerapellido = document.getElementById("primerapellido");
	var segundoapellido = document.getElementById("segundoapellido");
	var nit = document.getElementById("nit");
	var dui = document.getElementById("dui");
	var isss = document.getElementById("isss");
	var nup = document.getElementById("nup");
	var alerta = document.getElementById("alerta");

	function corregirPrimerNombre(){
		var value = primernombre.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(!/[aA-zZ]/.test(ultimoCaracter)) {
				value = value.substring(0, longitudActual - 1);
			}
			if(longitudActual > 50) {
				value = value.substring(0, longitudActual - 1);
			}
			primernombre.value = value;
		}
	}

	function corregirSegundoNombre(){
		var value = segundonombre.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(!/[aA-zZ]/.test(ultimoCaracter)) {
				value = value.substring(0, longitudActual - 1);
			}
			if(longitudActual > 50) {
				value = value.substring(0, longitudActual - 1);
			}
			segundonombre.value = value;
		}
	}


	function corregirPrimerApellido(){
		var value = primerapellido.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(!/[aA-zZ]/.test(ultimoCaracter)) {
				value = value.substring(0, longitudActual - 1);
			}
			if(longitudActual > 50) {
				value = value.substring(0, longitudActual - 1);
			}
			primerapellido.value = value;
		}
	}

	function corregirSegundoApellido(){
		var value = segundoapellido.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(!/[aA-zZ]/.test(ultimoCaracter)) {
				value = value.substring(0, longitudActual - 1);
			}
			if(longitudActual > 50) {
				value = value.substring(0, longitudActual - 1);
			}
			segundoapellido.value = value;
		}
	}

	function corregirDui() {
		var value = dui.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			switch (longitudActual){
				case 9:
					if(ultimoCaracter != '-'){
						value = value.substring(0, longitudActual - 1);
					}
					break;
				default:
					if(!/\d/.test(ultimoCaracter)){
						value = value.substring(0, longitudActual - 1);
					}
			}
			if (longitudActual > 10){
				value = value.substring(0, longitudActual - 1);
			}
			longitudActual = value.length;
			switch (longitudActual) {
				case 8:
					value += "-";
			}
			dui.value = value;
		}

	}

	function corregirNit() {
		var value = nit.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			switch (longitudActual){
				case 5:
				case 12:
				case 16:
					if(ultimoCaracter != '-'){
						value = value.substring(0,longitudActual - 1);
					}
					break;
				default:
					if(!/\d/.test(ultimoCaracter)) {
						value = value.substring(0,longitudActual - 1);
					}
			}
			if(longitudActual > 17) {
				value = value.substring(0, longitudActual - 1);
			}
			longitudActual = value.length;
			switch (longitudActual) {
				case 4:
				case 11:
				case 15:
					value += "-";
			}
			nit.value = value;
		}
	}

	function corregirIsss() {
		var value = isss.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(!/\d/.test(ultimoCaracter)) {
				value = value.substring(0, longitudActual - 1);
			}
			if(longitudActual > 9) {
				value = value.substring(0, longitudActual - 1);
			}
			isss.value = value;
		}
	}

	//Numero de AFP
	function corregirNup() {
		var value = nup.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(!/\d/.test(ultimoCaracter)) {
				value = value.substring(0, longitudActual - 1);
			}
			if(longitudActual > 12) {
				value = value.substring(0, longitudActual - 1);
			}
			nup.value = value;
		}
	}
	
</script>


@endsection

@section('scripts')

<style type="text/css">
	.errores{
		-webkit-box-shadow: 0 0 10px rgba(0,0,0,0.3);
		-moz-box-shadow: 0 0 10px rgba(0,0,0,0.3);
		-o-box-shadow: 0 0 10px rgba(0,0,0,0.3);
		background: red;
		box-shadow: 0 0 10px rgba(0,0,0,0.3);
		color: #fff;
		display: none;
		font-size: 14px;
		
	}
</style>
<script type="text/javascript">
	var expr = /[aA-zZ]/;
	var exprDui = /^\d{8}-\d{1}$/;
	var exprNit = /^\d{4}-\d{6}-\d{3}-\d{1}$/;
	var exprIsss = /^\d{9}$/;
	var exprAfp = /^\d{12}$/;

	$(document).ready(function(){
		$("#guardar").click(function(){

			var primernombre = $("#primernombre").val();
			var segundonombre = $("#segundonombre").val();
			var primerapellido = $("#primerapellido").val();
			var segundoapellido = $("#segundoapellido").val();
			var dui = $("#dui").val();
			var nit = $("#nit").val();
			var isss = $("#isss").val();
			var nup = $("#nup").val();

			if(primernombre == "" || !expr.test(primernombre)){

				$("#mensaje1").fadeIn();
				return false;

			}else{

				$("#mensaje1").fadeOut();

				if(!(segundonombre == "")){
					if(!expr.test(segundonombre)){

						$("#mensaje2").fadeIn();
						return false;

					}
				}else{

					$("#mensaje2").fadeOut();
				
				}

				if(primerapellido == "" || !expr.test(primerapellido)){

					$("#mensaje3").fadeIn();
					return false;

				}else{

					$("#mensaje3").fadeOut();

					if(!(segundoapellido == "")){
						if(!expr.test(segundoapellido)){

							$("#mensaje4").fadeIn();
							return false;

						}
					}else{

						$("#mensaje4").fadeOut();
					
					}

					if(dui == "" || !exprDui.test(dui)){

						$("#mensaje5").fadeIn();
						return false;

					}else{

						$("#mensaje5").fadeOut();
						
						if(nit == "" || !exprNit.test(nit)){

							$("#mensaje6").fadeIn();
							return false;

						}else{

							$("#mensaje6").fadeOut();

							if(isss == "" || !exprIsss.test(isss)){

								$("#mensaje7").fadeIn();
								return false;

							}else{

								$("#mensaje7").fadeOut();

								if(nup == "" || !exprAfp.test(nup)){

									$("#mensaje8").fadeIn();
									return false;

								}else{

										$("#mensaje8").fadeOut();

								}
					
							}
					
						}
					}
				}	
			}
		});
	});
</script>
@endsection


