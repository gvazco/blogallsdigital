@extends('admin.layout')

@section('header')

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">ROLES</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
				<li class="breadcrumb-item active">Roles</li>
			</ol>
		</div><!-- /.col -->
	</div><!-- /.row --> 
</div><!-- /.container-fluid -->

@stop

@section('content')

<div class="card">
	<div class="card-header">

		<h3 class="card-title">Listado de Roles</h3>
		
		@can('create', $roles->first())

		<a href="{{ route('admin.roles.create') }}" class="btn btn-primary float-right">
			<i class="fa fa-plus"></i> 
			Crear Role
		</a>

		@endcan
		
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="posts-table" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Identificador</th>
					<th>Nombre</th>
					<th>Permisos</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>

				@foreach ($roles as $role)

				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>{{ $role->display_name }}</td>
					<td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
					<td style="position: absolute;">
						
						@can('update', $role)

						<a href="{{ route('admin.roles.edit', $role )}}"
						class="btn btn-xs btn-info">
						<i class="fa fa-pencil-alt"></i>
					</a>

					@endcan

					@can('delete', $role)

					@if ($role->id !== 1)

					<form method="POST" 
					action="{{ route('admin.roles.destroy', $role) }}"
					style="display: inline;">
					{{ csrf_field() }} {{ method_field('DELETE') }}

					<button class="btn btn-xs btn-danger"
					onclick="return confirm('¿Estas seguro de querer eliminar este Role?')" 
					><i class="fa fa-times"></i></button>

				</form>

				@endif

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