<template>
	<div id="app">

		<layout>
			<transition name="page" mode="out-in">
				<keep-alive>
					<router-view></router-view>
				</keep-alive>
			</transition>
		</layout>

		<vue-snotify></vue-snotify>

	</div>
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	import Layout from './layouts/Default'

	@Component({
		components: {
			'layout': Layout
		}
	})
	export default class App extends Vue {
		mounted() {
			setTimeout(n => document.body.classList.add('pace-done'), 200)
		}
	}
</script>