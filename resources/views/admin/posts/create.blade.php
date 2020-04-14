
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	<form method="POST" action="{{ route('admin.posts.store', '#create') }}">
	{{csrf_field()}}

		<div class="modal-dialog" role="document">

			<div class="modal-content">

				<div class="modal-header">

				<h4 class="modal-title float-left" id="myModalLabel">Título de la publicación</h4>

				<button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					
				</div>
				
				<div class="modal-body">
				
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							
						<input id="post-title"
							name="title" 
							class="form-control" 
							value="{{ old('title') }}"
							placeholder="Ingresa aquí el título de la publicación" autofocus required>

						{!! $errors->first('title', '<span class="help-block alert-warning">:message</span>') !!}

					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">Guardar Publicación</button>
				</div>

			</div>

		</div>

	</form>

</div>

@push('scripts')
	
	<script>
    
	      if(window.location.hash === '#create')
	        {

	          $('#myModal').modal('show');

	        }

	        $('#myModal').on('hide.bs.modal', function(){

	            window.location.hash = '#';

	        });

	        $('#myModal').on('shown.bs.modal', function(){

	            $('#post-title').focus();
	            window.location.hash = '#create';

	        });
        
  	</script>

@endpush
