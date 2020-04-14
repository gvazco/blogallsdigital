<template>
	
	<article class="post">
		
		<div class="content-post">

			<!--  larevel Include post header  -->
			
			
			<post-header :post="post"></post-header>

			

			<p v-html="post.excerpt"></p>

			<footer class="containe-flex justify-content" id="leerMas">
				
				<div class="read-more">

					<post-link class="text-uppercase" 
					style="color:#de00a5" :post="post">Leer más...</post-link>
					
				</div>

				<!-- @include('post.tags') -->

				<div class="tags container-flex">

					<!-- @foreach($post->tags as $tag) -->

					<span class="tag text-capitalize" v-for="tag in post.tags">

						<tag-link :tag="tag" />

					</span>

					<!-- @endforeach -->

				</div>

			</footer>

		</div>

	</article>

</template>

<script>
	
	export default {

		props: ['post']

	}

</script>