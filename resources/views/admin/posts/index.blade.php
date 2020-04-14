@extends('admin.layout')

@section('header')

	<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">POSTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --> 
    </div><!-- /.container-fluid -->

@stop

@section('content')

	<div class="card">
	    <div class="card-header">

	      <h3 class="card-title">Listado de Publicaciones</h3>

	      <button class="btn btn-primary float-right" 
	      		data-toggle="modal" data-target="#myModal">
	      		<i class="fa fa-plus"></i> 
	      		Crear publicación
	      </button>

	    </div>
	    <!-- /.card-header -->
	    <div class="card-body">
	      <table id="posts-table" class="table table-bordered table-striped">
	        <thead>
	        <tr>

	          <th>ID</th>
	          <th>Título</th>
	          <th>Extracto</th>
	          <th>Acciones</th>
	    
	        </tr>
	        </thead>

	        <tbody>
	        	
	        	@foreach ($posts as $post)

	        		<tr>
	        			<td>{{ $post->id }}</td>
	        			<td>{{ $post->title }}</td>
	        			<td>{{ $post->excerpt }}</td>
	        			<td>
	        				<a href="{{ route('posts.show', $post )}}" 
	        					class="btn btn-xs btn-secondary">
	        					<i class="fa fa-eye"></i>
	        				</a>

	        				<a href="{{ route('admin.posts.edit', $post )}}"
	        				 	class="btn btn-xs btn-info">
	        				 	<i class="fa fa-pencil-alt"></i>
	        				 </a>
	        				 <form method="POST" 
	        				 		action="{{ route('admin.posts.destroy', $post) }}"
	        				 		style="display: inline;">
	        				 		{{ csrf_field() }} {{ method_field('DELETE') }}
	        				 	
	        				 	<button class="btn btn-xs btn-danger"
	        				 			onclick="return confirm('¿Estas seguro de querer eliminar esta publicación?')" 
	        				 	><i class="fa fa-times"></i></button>

	        				 </form>
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
	    $("#posts-table").DataTable({
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