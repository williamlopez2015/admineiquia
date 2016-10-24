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
<div class="container-fluid">
<!--Contenido -->
@foreach ($empleado as $emp)
@if(is_file(public_path().'/fotos/empleados/'.$emp->foto))
<div class="foto">
    <img src="{{ public_path()}}/fotos/empleados/{{$emp->foto}}" alt="{{$emp->nombrecompleto}}" height="110px" width="110px" class="img-thumbnail">
</div>
@else
 <div class="foto">
    <img src=""  class="img-thumbnail">
</div>
@endif
<div style="text-align: center;">
    <b><i>{{$emp->nombrecompleto}}</i></b>
</div>

<div class="dui" itemprop="articleBody"><div style="text-align: left;">
    <b><i>DUI:</i></b><i>{{$emp->dui}}</i>
</div>
<p></p>
<div class="nit" itemprop="articleBody"><div style="text-align: left;">
    <b><i>NIT:</i></b><i>{{$emp->nit}}</i>
</div>
<p></p>
<div class="dui" itemprop="articleBody"><div style="text-align: left;">
    <b><i>ESTADO:</i></b><i>{{$emp->estado}}</i>
</div>        
<!-- Fin Contenido-->
 @endforeach
</div>
</body>
</html>