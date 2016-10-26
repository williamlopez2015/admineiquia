{--{!! Form::open(array('url'=>'admin/empleado','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}--}
<form role="form">
    <div class="form-group">
    	<div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar Empleado..." value"$searchText">
        <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
        </div>
    </div>
</form>
{--{{Form::close()}}--}