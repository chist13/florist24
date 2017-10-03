<template lang="pug">
	#app

		layout
			transition(name="page" mode="out-in")
				keep-alive
					router-view

		vue-snotify

		calls
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	import Layout from './layouts/Default'
	import Calls from './components/calls/Calls'

	@Component({
		components: {
			'layout': Layout,
			'calls': Calls
		}
	})
	export default class App extends Vue {
		mounted() {
			setTimeout(n => document.body.classList.add('pace-done'), 200)
		}
	}
</script>