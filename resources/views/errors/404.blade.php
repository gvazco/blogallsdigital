@extends('layout')

@section('content')

	<section class="pages container">
		
		<div class="page page-about">
			
			<h1 style="font-size: 3em"><b>¡Oops!</b></h1> 
			<h2>La página que estas búscando no existe...</h2>
			<hr>
			<h4>Regresar a <a href="{{ route('pages.home') }}">Inicio</a></h4>

		</div>

	</section>

@endsection