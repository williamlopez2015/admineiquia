
<?php
//vemos si el usuario y contraseña son válidos
if ($_POST["usuario_login"]=="admin" && $_POST["password_login"]=="123"){
//usuario y contraseña válidos
//se define una sesion y se guarda el dato session_start();
$nickname="Alex";
$_SESSION["admin"]= $nickname;
header ("Location: ../index.php");
//print "<script>window.location='../index.php';</script>";
}else {
//si no existe se va a login.php
header("Location: ../index.php?errorusuario=true");
//print "<script>window.location='../index.php?errorusuario=true';</script>";
}
?>