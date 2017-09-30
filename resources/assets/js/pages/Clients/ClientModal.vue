<template lang="pug">
	my-modal(ref="modal")
		form(@submit.prevent="")
			.form-group
				label Name *
				input.form-control(v-model="user.name" placeholder="Name" autofocus)

			.form-group
				label Email *
				input.form-control(v-model="user.email" type="email" placeholder="Enter email")

			.form-group
				label Nickname
				input.form-control(v-model="user.nickname" placeholder="Enter nickname")

			.form-group
				label Gender *
				select.form-control(v-model="user.gender")
					option(value="M" selected) M
					option(value="F") F

		div(slot="header")
			i.fa.fa-laptop.modal-icon
			h4.modal-title Modal title
			small.font-bold Lorem Ipsum is simply dummy text of the printing and typesetting industry.

		div(slot="controls")
			my-button.pull-right(@click.native="submit"): strong add
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	@Component
	export default class ClientModal extends Vue {
		user = {
			name: '',
			email: '',
			nickname: '',
			gender: 'M'
		}

		get modal() {
			return this.$refs.modal
		}

		toggle() {
			this.modal.toggle()
		}

		submit() {
			this.$store.dispatch('clients/create', this.user)
				.then(res => {
					this.toggle()
					this.user = {gender: 'M'}
				})
				.catch(console.log)
		}
	}
</script>

<style lang="sass" scoped></style>