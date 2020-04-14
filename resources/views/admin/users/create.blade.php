@extends('admin.layout')

@section('content')

<div class="row">
	
	<div class="col-md-9">
		
		<div class="card">

			<div class="card-header whit-border">

				<h3 class="card-title">Crear usuario</h3>
				
			</div>

			<div class="card-body">

				@include('partials.error-messages')
				
				<form method="POST" action="{{ route('admin.users.store') }}">
					{{ csrf_field() }} 
					
					<div class="form-group">
						
						<label for="name">Nombre:</label>

						<input name="name" value="{{ old('name') }}" class="form-control"></input>

					</div>

					<div class="form-group">
						
						<label for="email">Email:</label>

						<input name="email" value="{{ old('email') }}" class="form-control"></input>

					</div>

					<hr>
					
					<div class="form-gorup col-md-6">

						<h6 class="text-muted">Roles</h6>

						@include('admin.roles.checkboxes')

					</div>
					
					<hr>

					<div class="form-gorup col-md-6">

						<h6 class="text-muted">Permisos adicionales</h6>

						@include('admin.permissions.checkboxes', ['model' => $user])

					</div>

					<hr>

					<span class="alert-dark p-2">¡Recuerda! Una contraseña segura se genera y envía por e-mail en automático**</span>

					<br>

					<button class="btn btn-primary btn-block mt-3">Guardar</button>	

				</form>

			</div>

		</div>

	</div>

</div>

@endsection