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
    <link href="{{ public_path()}}/css/nominaempleados.css" rel="stylesheet">

  

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
	<div class="col-lg-12">
	    <div class="row-fluid">
	    	<div class="panel-heading">
	    		<h1>Nomina de Empleados</h1>
	    	</div>
	    	<!-- /.panel-heading -->
	    	<div style="overflow-x:auto;">
	    		<div class="table-responsive table-bordered">
	    			<table class="table" id="tablanommina">
	    				<thead>
	    					<tr>
								<th>FOTO</th>
	    						<th>NOMBRE</th>
	    						<th>DUI</th>
	    						<th>NIT</th>
	    					</tr>
	    				</thead>
	    				@foreach ($empleados as $emp)
	    				<tbody>
	    					<tr>@if(is_file(public_path().'/fotos/empleados/'.$emp->foto))
            					<td><img src="{{ public_path()}}/fotos/empleados/{{$emp->foto}}" alt="{{$emp->nombrecompleto}}"  class="img-thumbnail"></td>
            					@else
	    					    <td>
	    					    	
	    					    </td>
	    					    @endif
	    						<td>{{ $emp->nombrecompleto }}</td>
	    						<td>{{ $emp->dui}}</td>
	    						<td>{{ $emp->nit }}</td>
	    					</tr>
	    				</tbody>
	    				@endforeach
	    			</table>
	    		</div>
	    		<!-- /.table-responsive -->
	    	</div>
        </div>
    </div>              
<!-- Fin Contenido-->
</div>
</body>
</html>