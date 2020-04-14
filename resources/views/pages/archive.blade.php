@extends('layout')

@section('content')

<section class="pages container">
	<div class="page page-archive">
		<h1 class="text-capitalize">Archivo:</h1>
		<p>En esta sección encontraras de manera organizada por autores y catagorias de todas las publicaciones periódicas en nuestro blog.</p>
		<div class="divider-2" style="margin: 35px 0;"></div>
		<div class="container-flex space-between">
			<div class="authors-categories">
				<h3 class="text-capitalize">Colaboradores</h3>
				<ul class="list-unstyled">

					@foreach ($authors as $author)

					<li>{{ $author->name }}</li>

					@endforeach

				</ul>
				<h3 class="text-capitalize">Categorias</h3>
				<ul class="list-unstyled">

					@foreach($categories as $category)

					<li class="text-capitalize">

						<a href="{{ route('categories.show', $category) }}">{{ $category->name}}</a>

					</li>

					@endforeach

				</ul>
			</div>
			<div class="latest-posts">
				<h3 class="text-capitalize">Ultimas Publicaciones</h3>

				@foreach($posts as $post)

				<p><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></p>

				@endforeach

				<h3 class="text-capitalize">Publicaciones por Fecha</h3>
				<ul class="list-unstyled">

					@foreach($archive as $date)

					<li class="text-capitalize">
						<a href="{{ route('pages.home', 
							['month' => $date->month, 'year' => $date->year]) }}">
							{{$date->monthname}} {{$date->year}} ({{$date->posts}})
						</a>
					</li>

					@endforeach

				</ul>
			</div>
		</div>
	</div>
</section>

@endsection	