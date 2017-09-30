<template lang="pug">
	nav.navbar-default.navbar-static-side
		.sidebar-collapse
			ul.nav.metismenu

				navigation-header

				template(v-for='item in list')

					navigation-dropdown(ref='dropdowns', v-if='hasChildren(item)', :item='item', @open='openDropdown')

					router-link.tr-3(v-else='', exact='', tag='li', :to='item.to', @click.native='openDropdown')
						a(href='#')
							i(:class="['fa', item.icon ? 'fa-' + item.icon : 'fa-home']")
							span.nav-label(v-text='item.label')
							span.label.label-primary.pull-right NEW
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	import { animateCSS } from '../../functions'
	import config from './config.json'

	@Component({
		watch: {
			isMini(val) {
				document.body.classList[val ? 'add' : 'remove']('mini-navbar')
			}
		},
		components: {
			'navigation-header': require('./NavigationHeader'),
			'navigation-dropdown': require('./NavigationDropdown')
		}
	})
	export default class Navigation extends Vue {
		list = config

		isMini = false

		mounted() {
			this.$event.$on('navigation:minimalize', () => this.toggle())
		}

		hasChildren(item) {
			return item.pathName == null && item.children && item.children.length > 0
		}

		openDropdown() {
			this.$refs.dropdowns.map(e => e.active ? e.close() : '')
		}

		toggle() {
			animateCSS(document.querySelector('.metismenu'), 'fadeIn')

			this.isMini = !this.isMini
		}
	}
</script>

<style lang="sass" scoped>
	.metismenu
		animation-delay: .15s
</style>