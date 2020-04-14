@extends('admin.layout')

@section('content')

<div class="row">
	
	<div class="col-md-6">
		
		<div class="card">

			<div class="card-header whit-border">

				<h3 class="card-title">Editar usuarios</h3>
				
			</div>

			<div class="card-body">

			@include('partials.error-messages')
				
				<form method="POST" action="{{ route('admin.users.update', $user) }}">
					{{ csrf_field() }} {{ method_field('PUT') }}
					
					<div class="form-group">
						
						<label for="name">Nombre:</label>

						<input name="name" value="{{ old('name', $user->name) }}" class="form-control"></input>

					</div>

					<div class="form-group">
						
						<label for="email">Email:</label>

						<input name="email" value="{{ old('email', $user->email) }}" class="form-control"></input>

					</div>

					<div class="form-group">
						
						<label for="password">Contraseña:</label>

						<input type="password" name="password" class="form-control" placeholder="Ingresa una contraseña**"></input>

						<span class="form-text text-info">Dejar en blanco si no deseas cambiar tu contraseña**</span> 

					</div>

					<div class="form-group">
						
						<label for="password_confirmation">Confirma tu contraseña:</label>

						<input type="password" name="password_confirmation" class="form-control" placeholder="Confirma la contraseña"></input>

					</div>

					<button class="btn btn-primary btn-block">Actualizar</button>	

				</form>

			</div>

		</div>

	</div>

	<div class="col-md-6">
		
		<div class="card">
			
			<div class="card-header with-border">
				
				<h3 class="card-title">Roles</h3>

			</div>

			<div class="card-body">

				@role('Admin')

				<form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
					{{ csrf_field() }} {{ method_field('PUT') }}

					@include('admin.roles.checkboxes')

					<button class="btn btn-primary btn-block">Actualizar Roles</button>

				</form>

				@else

				<ul class="list-group">

					@forelse($user->roles as $role)

					<li class="list-group-item">{{ $role->name }}</li>

					@empty

					<li class="list-group-item">{{ $role->name }}</li>					

					@endforelse

				</ul>

				@endrole

			</div>

		</div>

		<div class="card">
			
			<div class="card-header with-border">
				
				<h3 class="card-title">Permisos</h3>

			</div>

			<div class="card-body">

				@role('Admin')

				<form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
					{{ csrf_field() }} {{ method_field('PUT') }}

					@include('admin.permissions.checkboxes', ['model' => $user])

					<button class="btn btn-primary btn-block">Actualizar permisos</button>

				</form>

				@else

				<ul class="list-group">

					@forelse($user->permissions as $permission)

					<li class="list-group-item">{{ $permission->name }}</li>

					@empty

					<li class="list-group-item">Este usuario no tiene permisos</li>

					@endforelse

				</ul>

				@endrole



			</div>

		</div>

	</div>



</div>



@endsection