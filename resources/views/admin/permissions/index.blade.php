@extends('admin.layout')

@section('header')

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0 text-dark">PERMISOS</h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
				<li class="breadcrumb-item active">Permisos</li>
			</ol>
		</div><!-- /.col -->
	</div><!-- /.row --> 
</div><!-- /.container-fluid -->

@stop

@section('content')

<div class="card">
	<div class="card-header">

		<h3 class="card-title">Listado de permisos</h3>
		
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="posts-table" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Identificador</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>

				@foreach ($permissions as $permission)

				<tr>
					<td>{{ $permission->id }}</td>
					<td>{{ $permission->name }}</td>
					<td>{{ $permission->display_name }}</td>
					
					<td style="position: absolute;">
						
					@can('update', $permission)

						<a href="{{ route('admin.permissions.edit', $permission )}}"
						class="btn btn-xs btn-info">
						<i class="fa fa-pencil-alt"></i>
						</a>
						
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