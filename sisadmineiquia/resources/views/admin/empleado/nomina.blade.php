<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>Prueba</h1>
<div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <table class="table table-bordered table-hover" id="tablaempleado">
                                            <thead>
                                                <tr>
                                                	<th>Nombre</th>
                                                    <th>Dui</th>
                                                    <th>Nit</th>
                                                </tr>
                                            </thead>
                                             @foreach ($empleados as $emp)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $emp->nombrecompleto }}</td>
                                                    <td>{{ $emp->dui}}</td>
                                                    <td>{{ $emp->nit }}</td>
                                                </tr>
                                                @endforeach 
                                            </tbody>
</table>

</body>
</html>