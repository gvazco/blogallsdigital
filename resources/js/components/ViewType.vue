<template>
	
	<div>
		
		<div v-html="post.iframe"></div>

	</div>

</template>

<script>
	
	export default {

		props: ['post'],
	}

</script>