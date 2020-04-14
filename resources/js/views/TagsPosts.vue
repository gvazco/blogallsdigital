<template>
	
	<paginator 
		:url="`/api/etiquetas/${this.tag}`"
		component-name="posts-list"
	/>

</template>

<script>
	
	export default {

		props: ['tag'],

	}

</script>