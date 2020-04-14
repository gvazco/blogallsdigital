@extends('admin.layout')

@section('content')

<div class="row">
	
	<div class="col-md-9">
		
		<div class="card">

			<div class="card-header whit-border">

				<h3 class="card-title">Actualizar Permiso</h3>
				
			</div>

			<div class="card-body">
				
				@include('partials.error-messages')
				
				<form method="POST" action="{{ route('admin.permissions.update', $permission) }}">

					{{ method_field('PUT') }} {{ csrf_field() }}

					<div class="form-group">
						
						<label for="display_name">Identificador:</label>
						<input disabled
							value="{{ $permission->display_name }}"
							class="form-control">

					</div>

					<div class="form-group">
						
						<label for="display_name">Nombre:</label>
						<input name="display_name"
							value="{{ old('display_name', $permission->display_name) }}"
							class="form-control">

					</div>

					<button class="btn btn-primary btn-block mt-3">Actualizar Permisos</button>	

				</form>

			</div>

		</div>

	</div>

</div>

@endsection