function validarlogin()
{
var form=document.formu;
var ok1,ok2;

	if(form.usuario_login.value==0)
	{
	//alert("El campo nombre est� vacio");
	document.getElementById("usuario_login").innerHTML=" El campo Nombre est&aacute; vacio";
	form.usuario_login.value="";
	form.usuario_login.focus();
	return false;
	}
	else
	{
		document.getElementById("usuario_login").innerHTML=" ";
		ok1=true;
		}
		if(form.password_login.value==0)
		{
		//alert("El campo Clave est� vacio");
		document.getElementById("password_login").innerHTML="El campo Clave est&aacute; vacio";
		form.password_login.value="";
		form.password_login.focus();
		return false;
		}
		else
		{
		document.getElementById("password_login").innerHTML="";
		ok2=true;
		}
		//Si todo esta bien se redirecciona al action
		if(ok1==true && ok2==true)
		{ window.location='mod-login/autenticacion.php'; }

}