@extends('admin.layout')

@section('content')

<div class="row">
	
	<div class="col-md-9">
		
		<div class="card">

			<div class="card-header whit-border">

				<h3 class="card-title">Crear Role</h3>
				
			</div>

			<div class="card-body">
				
				@include('partials.error-messages')
				
				<form method="POST" action="{{ route('admin.roles.store') }}">
					
					@include('admin.roles.form')

					<br>

					<button class="btn btn-primary btn-block mt-3">Guardar Role</button>	

				</form>

			</div>

		</div>

	</div>

</div>

@endsection