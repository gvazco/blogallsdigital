@extends('admin.layout')

@section('header')

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">USUARIOS</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
				<li class="breadcrumb-item active">Usuarios</li>
			</ol>
		</div><!-- /.col -->
	</div><!-- /.row --> 
</div><!-- /.container-fluid -->

@stop

@section('content')

<div class="card">
	<div class="card-header">

		<h3 class="card-title">Listado de Usuarios</h3>
		
		@can('create', $users->first())

		<a href="{{ route('admin.users.create') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus"></i> 
			Crear usuario
		</a>

		@endcan
		
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="posts-table" class="table table-bordered table-striped">
			<thead>
				<tr>

					<th>ID</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Roles</th>
					<th>Acciones</th>

				</tr>
			</thead>

			<tbody>

				@foreach ($users as $user)

				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->getRoleNames()->implode(', ') }}</td>
					<td>

						@can('view', $user)

						<a href="{{ route('admin.users.show', $user )}}" 
						class="btn btn-xs btn-secondary">
						<i class="fa fa-eye"></i>
					</a>

					@endcan

					@can('update', $user)

					<a href="{{ route('admin.users.edit', $user )}}"
					class="btn btn-xs btn-info">
					<i class="fa fa-pencil-alt"></i>
				</a>

				@endcan

				@can('delete', $user)
				<form method="POST" 
				action="{{ route('admin.users.destroy', $user) }}"
				style="display: inline;">
				{{ csrf_field() }} {{ method_field('DELETE') }}

				<button class="btn btn-xs btn-danger"
				onclick="return confirm('¿Estas seguro de querer eliminar este usuario?')" 
				><i class="fa fa-times"></i></button>

			</form>

			@endcan

		</td>
		
	</tr>

	@endforeach

</tbody>

</table>
</div>
<!-- /.card-body -->
</div>

@stop

@push('styles')

<link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">

@endpush

@push('scripts')

<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- page script -->
<script>
	$(function () {
		$("#users-table").DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
		});
	});
</script>

<script>
	
	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').focus()
	})

</script>





@endpush