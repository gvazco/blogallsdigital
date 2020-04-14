@extends ('admin.layout')

@section('header')

	<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">EDITAR POSTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --> 
    </div><!-- /.container-fluid -->

@stop

@section('content')

@if ($post->photos->count())

	<div class="col-md-12">

		<div class="card">
			
			<div class="card-body">
				
				<div class="row"> 

					@foreach ($post->photos as $photo)

					<div class="col-md-2">

						<form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
						{{ method_field('DELETE') }} {{ csrf_field() }}
						
							<button class="btn btn-danger btn-xs" style="position:absolute;">
								<i class="fas fa-ban"></i>
							</button>

							<img class="img-responsive"style="width: 100%;" src="{{ url($photo->url) }}">

						</div>

					</form>

					@endforeach 

				</div>

			</div>

		</div>

	</div>

@endif

<form method="POST" action="{{ route('admin.posts.update', $post) }}">
	{{ csrf_field() }} {{ method_field('PUT') }}

	<div class="row">
		
		<div class="col-md-8">

			<div class="card">

				<div class="card-body">
						
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
							
						<label>Titulo de la publicación</label>
							
						<input name="title" 
						class="form-control" 
						value="{{ old('title', $post->title) }}"
						placeholder="Ingresa aquí el título de la publicación">

						{!! $errors->first('title', '<span class="help-block alert-warning">:message</span>') !!}

					</div>

					<div class="form-group  {{ $errors->has('body') ? 'has-error' : '' }}">
							
						<label>Contenido de la publicación</label>
						<textarea rows="10" name="body" id="editor" class="form-control" placeholder="Ingresa aquí el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>

						{!! $errors->first('body', '<span class="help-block alert-warning">:message</span>') !!}

					</div>

					<div class="form-group  {{ $errors->has('iframe') ? 'has-error' : '' }}">
							
						<label>Contenido embebido (iframe)</label>
						<textarea rows="2" name="iframe" id="editor" class="form-control" placeholder="Ingresa contenido embebido">{{ old('iframe', $post->iframe) }}</textarea>

						{!! $errors->first('iframe', '<span class="help-block alert-warning">:message</span>') !!}

					</div>

				</div>
				
			</div>
			
		</div>

		<div class="col-md-4">
			
			<div class="card">

				<div class="card-body">

					<div class="form-group">

		                <label>Fecha de Publicación:</label>

		                <div class="input-group date">

		                  <div class="input-group-prepend">

		                  	<span class="input-group-text">

		                   		<i class="fa fa-calendar"> </i>

		                   	</span>

		                  </div>

		                  <input name="published_at" 
		                  		type="text" 
		                  		value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
		                  		class="form-control pull-right" 
		                  		id="datepicker" 
		                  		placeholder="00/00/0000">

		                </div>

		            </div>

		            <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
		            	
		            	<label>Categorias</label>

		            	<select name="categories" class="form-control select2">
		            		
		            		<option  value="">Selecciona una catogoria:</option>

		            		@foreach ($categories as $category)
		            			
		            			<option value="{{ $category->id }}"

		            					{{ old('categories', $post->category_id) == $category->id ? 'selected' : ''}}

		            				>{{ $category->name }}</option>

		            		@endforeach

		            	</select>

		            	{!! $errors->first('categories', '<span class="help-block alert-warning">:message</span>') !!}

		            </div>

		            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">

		            	<label>Etiquetas</label>
		            	
		            	<select name="tags[]"
		            			class="form-control select2" 
		            			multiple="multiple" 
		            			data-placeholder="Selecciona una o más etiquetas" style="width: 100%;">
		                    
		                    @foreach ($tags as $tag)

		                    	<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} 
		                    		value="{{ $tag->id }}">{{ $tag->name }}</option>

		                    @endforeach

		                 </select>

		                 {!! $errors->first('tags', '<span class="help-block alert-warning">:message</span>') !!}

		            </div>

					<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
						
						<label>Extracto de publicación</label>
						<textarea name="excerpt" 
								class="form-control" 
								placeholder="Ingresa aquí el extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>

						{!! $errors->first('excerpt', '<span class="help-block alert-warning">:message</span>') !!}

					</div>

					<div class="form-group">
						
						<div class="dropzone">
							


						</div>

					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-primary btn-block">Guardar publicación</button>
						
					</div>

					<div>
						
						<a href="{{ route('posts.show', $post )}}" 
        					class="btn btn-block btn-secondary">
        					<i class="fa fa-eye"> <small> Ver publicación </small></i>
        				</a>

					</div>

				</div>				

			</div>

		</div>

	</div>

</form>		

@stop

@push('styles')
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

	<link rel="stylesheet" href="/adminlte/plugins/datepicker/css/bootstrap-datepicker3.css">

	<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
  	<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endpush

@push('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

	<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

	<script src="/adminlte/plugins/datepicker/js/bootstrap-datepicker.js"></script>

	<!-- Select2 -->
	<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
		
    $( "#datepicker" ).datepicker({

    	autoclose: true

    });
  	
    CKEDITOR.replace( 'editor' );
    CKEDITOR.config.height = 289;

    $(".select2").select2({
    	tags: true
    });

    var myDropzone = new Dropzone('.dropzone', {

    	url:'/admin/posts/{{ $post->url }}/photos',
    	acceptedFiles: 'image/*',
    	maxFilesize: 2,
    	paramName: 'photo',
    	headers: {

    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
    	},

    	dictDefaultMessage: 'Arrastra las fotos aquí para subirlas'

    });

    myDropzone.on('error', function(file, res){

    	var msg = res.photo[0];

    	$('.dz-error-message:last > span').text(msg);

    });

    Dropzone.autoDiscover = false;


</script>

@endpush


