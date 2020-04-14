<template>

	<section class="pages container">
		
		<div class="page page-about">
			
			<h1 style="font-size: 3em"><b>¡Oops!</b></h1> 
			<h2>No tienes autorización para ver la página que estas búscando.</h2>		
			<!-- <span style="color:red;">{{ $exception->getMessage() }}</span> -->		
			<hr>
			<h3>Regresar a <router-link :to="{name: 'home'}" class="text-uppercase pure-menu-link c-blue">Inicio</router-link></h3>

		</div>

	</section>

</template>

