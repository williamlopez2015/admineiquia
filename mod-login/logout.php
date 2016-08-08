<?php
session_start();
session_destroy();
//echo '<script> window.alert("Cerraste sesion!!");
				//window.location = "../index.php"; </script>';
print "<script>window.location='../index.php';</script>";
?>
