	var primernombre=document.getElementById("primernombre");
	var segundonombre = document.getElementById("segundonombre");
	var primerapellido = document.getElementById("primerapellido");
	var segundoapellido = document.getElementById("segundoapellido");
	var nit = document.getElementById("nit");
	var dui = document.getElementById("dui");
	var isss = document.getElementById("isss");
	var nup = document.getElementById("nup");
	var alerta = document.getElementById("alerta");
	var fechaApertura = document.getElementById("fechaApertura");
	var fechaAdInicio = document.getElementById("fechaAdInicio");
	var fechaAdFin = document.getElementById("fechaAdFin");
	var fechaInInicio = document.getElementById("fechaInInicio");
	var fechaInFin = document.getElementById("fechaInFin");

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

	function corregirFecha(){
		var value = fechaApertura.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(longitudActual == 1){
				value = "";
			}

			fechaApertura.value = value;
		}
	}

	function corregirFecha2(){
		var value = fechaAdInicio.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(longitudActual == 1){
				value = "";
			}

			fechaAdInicio.value = value;
		}
	}

	function corregirFecha3(){
		var value = fechaAdFin.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(longitudActual == 1){
				value = "";
			}

			fechaAdFin.value = value;
		}
	}

	function corregirFecha4(){
		var value = fechaInInicio.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(longitudActual == 1){
				value = "";
			}

			fechaInInicio.value = value;
		}
	}

	function corregirFecha5(){
		var value = fechaInFin.value;
		var longitudActual = value.length;
		if(longitudActual){
			var ultimoCaracter = value.substring(longitudActual - 1);
			if(longitudActual == 1){
				value = "";
			}

			fechaInFin.value = value;
		}
	}
	