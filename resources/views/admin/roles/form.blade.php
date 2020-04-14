{{ csrf_field() }} 

<div class="form-group">

	<label for="name">Identificador:</label>

	@if($role->exists)

	<input value="{{ $role->name }}" class="form-control" disabled></input>

	@else

	<input name="name" value="{{ old('name', $role->name) }}" class="form-control"></input>

	@endif

</div>

<div class="form-group">

	<label for="display_name">Nombre:</label>

	<input name="display_name" value="{{ old('display_name', $role->display_name) }}" class="form-control"></input>

</div>

<hr>

<div class="form-gorup col-md-6">

	<h6 class="text-muted">Permisos</h6>

	@include('admin.permissions.checkboxes', ['model' => $role])

</div>