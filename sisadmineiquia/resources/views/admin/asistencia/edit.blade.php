@extends('layouts.admin')
@section('contenido')
 <div class="row">
    <div class="col-lg-12">
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> <a href="/admin/asistencia"> Gestionar Asistencia</a></li>
        <li class="active"><i class="fa fa-desktop"></i> Crear Puesto</li>
      </ol>
    </div>
 </div>
 
 <div class="row">
    <div class="col-lg-12">
       <h3>Nueva Asistencia</h3>
    </div>
    
      @if (count($errors)>0)
         <div class="alert alert-danger">
           <ul>
           @foreach ($errors->all() as $error)
             <li>{{$error}}</li>
           @endforeach
           </ul>
         </div>
      @endif
     
      @include('mensajes.messages')
 </div>
 
 @foreach ($asistencia as $asis)         
 @endforeach
 
 {!!Form::model($asistencia,['method'=>'PATCH','route'=>['admin.asistencia.update',$asis->idasistencia]])!!}
 {{Form::token()}}  

  <div class="row">
 
     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
          <label for="fechaasistencia">Fecha</label>
          <input type="text" name="fechaasistencia" class="tcal form-control" id="fechaapertura" required value="{{$asis->fechaasistencia}}" class="form-control" >
        </div>
     </div>


     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
          <label for="turno"> Turno </label>
          <select name="turno" id="turno" class="form-control">
              @foreach ($asistencia as $asis)
                  @if ($asis->turno=='0')
                    <option value="0" selected>{{"Mañana"}}</option>
                    <option value="1">{{"Tarde"}}</option>
                    @else
                      <option value="0">{{"Mañana"}}</option>
                      <option value="1" selected>{{"Tarde"}}</option>
                  @endif
              @endforeach       
          </select>     
        </div>
     </div>
  </div>


	<div class="row col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-body">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover" id="detalles" >
              
              <thead style="background-color: #A9D0F5">
                <th>Opciones</th>
                <th>Empleado</th>
                <th>Hora Entrada</th>
                <th>Hora Salida</th>
                <th>Observaciones</th>
              </thead>
              <tfoot>
              </tfoot>
            <tbody> 
              @foreach($detalles as $det)
              <tr>
              <td></td>
                  <td> 
                       <select name="idexpediente" class="form-control selectpicker" id="idexpediente" class="form-control" data-live-search="true">
                       @foreach($empleados as $emp)
                         @if($emp->idexpediente==$det->idexpediente)
                         <option value="{{$det->idexpediente}}" selected>{{$det->nombre}}</option>
                         @else
                            <option value="{{$emp->idexpediente}}">{{$emp->nombre}}</option>
                         @endif
                       @endforeach
                       </select>
                  </td>
                  <td><input type="text" name="horaentrada" id="horaentrada" value="{{$det->horaentrada}}" class="form-control"> </td>
                  <td><input type="text" name="horasalida" id="horasalida" value="{{$det->horasalida}}" class="form-control"> </td>
                  <td><input type="text" name="observaciones" id="observaciones" value="{{$det->observaciones}}" class="form-control"> </td>
              </tr>
              @endforeach
            </tbody>
              </table>  
            </div>
        </div>
      </div>
     </div>
      </div>

     <div class="row">
		  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
        <div class="form-group">
          <input type="hidden" name="_token" value="{{csrf_token()}}"></input>
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
     </div>
    </div>

{!!Form::close()!!}	

@push('scripts')
<script>

$(document).ready(function(){
    $('#detalles').DataTable();
    });

$(document).ready(function(){
      $('#bt_add').click(function(){
        agregar();
      });
    });
    
    var cont=0;
    cant=0;
    $('#btn_guardar').hide();

    function agregar()
    { 
      
      idexpediente=$("#idexpediente").val();
      nombre=$("#idexpediente option:selected").text();
      horaentrada=$("#horaentrada").val();
      horasalida=$("#horasalida").val();
      observaciones=$("#observaciones").val();

      if(idexpediente!="" && nombre!="" &&  horaentrada!="" && horasalida!="")
      {
        var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td> <td><input type="hidden" name="idexpediente[]" value="'+idexpediente+'">'+idexpediente+'</td> <td><input type="hidden" name="idempleado[]" value="'+idexpediente+'">'+nombre+' </td> <td><input type="hidden" name="horaentrada[]" value="'+horaentrada+'">'+horaentrada+'</td> <td><input type="hidden" name="horasalida[]" value="'+horasalida+'">'+horasalida+'</td> <td><input type="text" name="observaciones[]" value="'+observaciones+'"></td> </tr>';
      
        cont++;
        cant++;
        limpiar();
        evaluar();
        $("#cantidad").html("Detalles"+": "+cant);
        $('#detalles').append(fila);
          
      }
      else{
          alert("¡Error al ingresar el detalle, revise los datos!");
      }

    }

    function limpiar(){
      $("#horaentrada").val("");
      $("#horasalida").val("");
      $("#observaciones").val("");
    }

    function evaluar()
    {
      if(cant>0){
        $('#btn_guardar').show();
      }
      else{
        $('#btn_guardar').hide();
      }
    }

    function eliminar(index){
      cant--;
      $("#cantidad").html("Detalles"+": "+cant);
      $('#fila'+index).remove();
      evaluar();    
    }

</script>
@endpush
@endsection