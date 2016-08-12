<?php
//error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EIQUIA - FIAUES</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="index.php"><b>EIQUIA<span>FIAUES</span></b></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav"> 
            <!-- Aqui va el login--> 
            <?php
            //if (!(strlen(isset($_SESSION["admin"])) < 1){
                //if (0 < 1){
                //include 'mod-login/login.php';
            //}else{?>
                
            <!--Termina el login -->
                <?php
                include 'mod-login/logeado.php';            
                //} ?>

           

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
            <!--navegacion-->    
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-home"></i> Inicio</a>
                    </li>
                    <?php include 'mod-login/navegation.php'; ?>
                </ul>
            </div>

            
            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Pagina Principal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron">
                    <h1>Bienvenido!!!</h1>
                    <p>Este es sistema informático para la gestión de expediente académico-administrativo del recurso humano de EIQUIA-FIA-UES.</p>
                    <p>
                    </p>
                </div>
                 <div class="page-header">
                    <h1>Descripción</h1>
                </div>
                <div class="row">
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title">Control de Empleados</h3>
                            </div>
                            <div class="panel-body">
                                Adminitracion de Expediente de los Empleados.
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title">Control de Asistencie</h3>
                            </div>
                            <div class="panel-body">
                                Administrar el registro de asistencia y permisos de los empleados.
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title">Reportes</h3>
                            </div>
                            <div class="panel-body">
                                Reportes Sencillos y facil de generar.
                            </div>
                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                </div>


               
               
                <div class="page-header">
                    <h1>Wells</h1>
                </div>
                <div class="well">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>

            </div>
            <!-- /.container-fluid -->
             <!--main content end-->
        </div>
        <!-- /#page-wrapper -->
        <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    <i class="fa fa-copyright"></i> 2016. Todos los derechos reservados - 
                    <a  href="https://www.ues.edu.sv/">Universidad de El Salvador</a>
                    <a href="#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!-- Footer Fin-->
        

    </div>
    <!-- /#wrapper -->

    <!-- funciones de validacion -->
    <script src="mod-login/js/funciones.js"></script>


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    
</body>

</html>
