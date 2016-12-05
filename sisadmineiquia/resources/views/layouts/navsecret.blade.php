            <li>
                <a href="{{url('/')}}"><i class="fa fa-fw fa-home"></i> Inicio</a>
             </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-paperclip"></i> <span> Gestion de Empleados</span> <i class="fa fa-angle-left pull-right"></i></a>

                <ul id="demo" class="collapse">

                   <li>
                        <a href="{{url('/admin/empleado/create')}}"><i class="glyphicon glyphicon-user"></i> Agregar Empleado</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/empleado')}}"><i class="fa fa-users"></i> Administrar Empleados</a>
                    </li>
                    <li>
                        <a href="{{url('admin/empleado/nominareport')}}"><i class="glyphicon glyphicon-print"></i> Nomina Empleados</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-paperclip"></i> Control de Asistencia<i class="fa fa-angle-left pull-right"></i></a>
                <ul id="demo1" class="collapse">
                    <li>
                        <a href="{{url('/admin/asistencia/create')}}"><i class="glyphicon glyphicon-pencil"></i> Agregar Asistencia</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/asistencia')}}"><i class="fa fa-plus"></i> Gestionar Asistencia</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-th-list"></i> Reporte de asistencia</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#demo2"><i class="glyphicon glyphicon-list-altp"></i> Gestionar Permisos Expediente <i class="fa fa-angle-left pull-right"fa fa-angle-left pull-right></i></a>
                <ul id="demo2" class="collapse">
                    <li>
                        <a href="{{url('/admin/permiso/create')}}"><i class="glyphicon glyphicon-ok"></i> Agregar Permiso</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/permiso')}}"><i class="glyphicon glyphicon-file"></i> Gestionar Permisos</a>
                    </li>
                </ul>
            </li>