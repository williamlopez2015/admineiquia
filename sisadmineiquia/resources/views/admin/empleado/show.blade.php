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
                                                    <th>Id</th>
                                                    <th>Foto</th>
                                                    <th>Nombre</th>
                                                    <th>Dui</th>
                                                    <th>Nit</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $empleado->IDEMPLEADO }}</td>
                                                    <td>
                                                       
                                                    </td>
                                                    <td>{{ $empleado->PRIMERNOMBRE }}</td>
                                                    <td>{{ $empleado->DUI}}</td>
                                                    <td>{{ $empleado->NIT }}</td>
                                                    <td>{{ $empleado->ESTADO }}</td>
                                                </tr>

                                            </tbody>
</table>

</body>
</html>