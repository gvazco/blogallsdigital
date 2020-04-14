@extends('layout')

@section('content')

	<section class="pages container">
		
		<div class="page page-about">
			
			<h1 style="font-size: 3em"><b>¡Oops!</b></h1> 
			<h2>No tienes autorización para ver la página que estas búscando.</h2>		
			<span style="color:red;">{{ $exception->getMessage() }}</span>		
			<hr>
			<h4><a href="{{ url()->previous() }}">Regresar</a></h4>

		</div>

	</section>

@endsection