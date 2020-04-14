<template>
	
	<div class="form-contact">

		<transition name="fade" mode="out-in">

		<h4 v-if="sent">Tu mensaje ha sido recibido, nos pondremos en contacto a la brevedad.</h4>

		<form v-else @submit.prevent="submit">

			<div class="input-container container-flex space-between">

				<input v-model="form.name" type="text" placeholder="Ingresa tu Nombre" class="input-name" required>
				<input v-model="form.email" type="email" placeholder="Email" class="input-email" required>

			</div>

			<div class="input-container">

				<input v-model="form.subject" placeholder="Asunto" class="input-subject" required>

			</div>

			<div class="input-container">

				<textarea v-model="form.message" cols="30" rows="10" placeholder="¿Cuál es tu mensaje? ¿Cómo podemos ayudarte?" required></textarea>

			</div>

			<div class="send-message">

				<button class="text-uppercase" :disabled="working">

					<span v-if="working">Enviando...</span>
					<span v-else>Enviar mensaje</span>

				</button>

			</div>

		</form>

		</transition>

	</div>

</template>

<script>
	
	export default {

		data(){

			return {

				sent: false,
				working: false,
				form: {
					name: '',
					email: '',
					subject: '',
					massage: '',
				}

			}

		},

		methods:{

			submit(){

				this.working = true;

				axios.post('/api/messages', this.form)
					.then(res => {

						this.sent = true;
						this.working = false;

					})

					.catch(errors => {

						this.sent = false;
						this.working = false;

					})

			}

		}

	}

</script>