
@if (Session::has('update'))
	<div class="alert alert-success" role='alert'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>{{Session::get('update')}}</strong>
	</div>
@endif

@if (Session::has('delete'))
	<div class="alert alert-success" role='alert'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>{{Session::get('delete')}}</strong>
	</div>
@endif

@if (Session::has('destroy'))
	<div class="alert alert-success" role='alert'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>{{Session::get('destroy')}}</strong>
	</div>
@endif


@if (Session::has('save'))
	<div class="alert alert-success" role='alert'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>{{Session::get('save')}}</strong>
	</div>
@endif

@if (Session::has('create'))
	<div class="alert alert-success" role='alert'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>{{Session::get('create')}}</strong>
	</div>
@endif

@if (Session::has('store'))
	<div class="alert alert-success" role='alert'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>{{Session::get('store')}}</strong>
	</div>
@endif


@if (Session::has('edit'))
	<div class="alert alert-success" role='alert'>
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<strong>{{Session::get('edit')}}</strong>
	</div>
@endif