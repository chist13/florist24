<template lang="pug">
	div(v-if="calling") ring ring...
	div(v-else="") info about last
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	@Component()
	export default class Calls extends Vue {
		calling = false

		created() {
			this.calling = false
		}

		answer() {
			this.calling = true
		}

		hangUp() {
			this.calling = false
		}
	}
</script>