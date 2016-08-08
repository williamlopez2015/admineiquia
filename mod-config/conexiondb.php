<?php
//MySQLi
require_once 'mysql-login.php';

//function conexion(){
	$conectar = new mysqli($hostname,$username,$password,$database) or die("No se pudo conectar al servidor de bases de datos MySQL");

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
        
     //return $conectar;
    //}

    //$conectarse = conexion();
	//mysqli_set_charset($conectarse ,"utf8");
	//$acentos = $conectarse->query(" SET NAMES 'utf8' ");
    
?>