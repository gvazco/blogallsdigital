<template>
	
	<paginator 
		:url="`/api/categorias/${this.category}`"
		component-name="posts-list"
	/>

</template>

<script>
	
	export default {

		props: ['category']

	}

</script>