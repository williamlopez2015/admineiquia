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