<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SEIQUIA - FIAUES</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ public_path()}}/css/perfilempleado.css" rel="stylesheet">

  

    <!-- Custom Fonts -->
    <!--<link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">-->

    <!-- Custom datatable CSS -->
   <!--<link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">-->
    <!-- <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">-->



    <!-- Estilo de calendarios -->
    <!--<link rel="stylesheet" href="{{asset('css/tcal.css')}}"></script>-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<div id="contenedor">
<!--Contenido -->
@foreach ($empleado as $emp)
<header>
    <div id="titulo">
        <div id="logo">
        @if(is_file(public_path().'/fotos/empleados/'.$emp->foto))
        <div class="foto">
            <img src="{{ public_path()}}/fotos/empleados/{{$emp->foto}}" alt="{{$emp->nombrecompleto}}" height="110px" width="110px" class="img-thumbnail">
        </div>
        @else
        <div class="foto">
            <img src=""  class="img-thumbnail">
        </div>
        @endif
        </div>
        <h1>{{$emp->nombrecompleto}}</h1>
        @if($emp->estado=='1')
        <h2><b>ESTADO:</b> Activo</h2>
        @else
        <h2><b>ESTADO:</b> De Baja</h2>
        @endif
    </div>
    <div style="clear:both;"></div>
</header>
<section>
<div id="datospersonales">
    <h2><b>DATOS PERSONALES<b></h2>
     @if($emp->sexo=='M')
    <h3><b><i>SEXO:</i></b><i>Masculino</i></h3>
    @else
    <h3><b><i>SEXO:</i></b><i>Femenino</i></h3>
    @endif
    <h3><b><i>DUI:</i></b><i>{{$emp->dui}}</i></h3>
    <h3><b><i>NIT:</i></b><i>{{$emp->nit}}</i></h3>
    <h3><b><i>ISSS:</i></b><i>{{$emp->isss}}</i></h3>
    <h3><b><i>AFP:</i></b><i>{{$emp->afp}}</i></h3>
</div>
</section>
            <div style="clear:both"></div>
 @endforeach
 @if($expedienteadministrativo==null)
 <section>
 </section>
 @else
 @foreach ($expedienteadministrativo as $expadmin)
<section>
<div id="datosexpadmin">
    <h2><b>Expediente Administrativo<b></h2>
    <h3><b><i>Cod Expediente:</i></b><i>{{$expadmin->idexpediente}}</i></h3>
    <h3><b><i>Fecha de Creacion:</i></b><i>{{$expadmin->fechaapertura}}</i></h3>
    <h3><b><i>Codigo de Contrato:</i></b><i>{{$expadmin->codigocontrato}}</i></h3>
    @if($expadmin->tiempointegral=='1')
    <h3><b><i>TIEMPO INTEGRAL:</i></b><i>Si</i></h3>
    @else
    <h3><b><i>TIEMPO INTEGRAL:</i></b><i>No</i></h3>
    @endif
    <h3><b><i>DESCRIPCION:</i></b><i>{{$expadmin->descripcionadmin}}</i></h3>
</div>
</section>
            <div style="clear:both"></div>
 @endforeach
 @endif
<!-- Fin Contenido-->
</div>
</body>
</html>