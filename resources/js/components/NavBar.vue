<template>
	
	<nav class="custom-wrapper" id="menu">
		
		<div class="pure-menu">
			<a href="#" class="custom-toggle btn-bar" id="toggle"></a>
		</div>

		<ul class="container-flex list-unstyled">

			<li>

				<router-link :to="{name: 'home'}" class="text-uppercase pure-menu-link c-gris-2">Inicio</router-link>

			</li>

			<li>

				<router-link :to="{name: 'about'}" class="text-uppercase pure-menu-link c-gris-2">Acerca de</router-link>
				
			</li>
			
			<li>

				<router-link :to="{name: 'archive'}" class="text-uppercase pure-menu-link c-gris-2">Archivo</router-link>
				
			</li>

			<li>

				<router-link :to="{name: 'contact'}" class="text-uppercase pure-menu-link c-gris-2">Contacto</router-link>
				
			</li>
			
			<li>
				
				<a href="https://allsdigital.net/es" target="_blank" class="text-uppercase c-blue">Cursos Online</a>

			</li>

		</ul>

	</nav>

</template>