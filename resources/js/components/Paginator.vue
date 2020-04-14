<template>
	
	<div>

		<components :is="componentName" :items="items"></components>
		
		<pagination-links :pagination="pagination" />

	</div>	

</template>

<script>
	
	export default{

		props: ['url', 'componentName'],
		data(){

			return {

				pagination: {},
				items: []

			}

		},

		mounted(){

			axios.get(`${this.url}?page=${ this.$route.query.page || 1 }`)

			.then(res => {

				this.pagination = res.data;
				this.items = res.data.data;
				delete this.pagination.data;

			})

			.catch(err => {

				console.log(err);

			});

		}

	}

</script>

<style lang="scss">
	
	.pagination{

		a.active{
			
			background-color: rgb(222, 0, 165);
			color:white;

		}

	}

</style>