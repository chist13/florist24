<template lang="pug">
	li.tr-3(v-cloak :class="{active: active}")
		a(href="#" @click.prevent="toggle()")
			i.fa(:class="['fa', item.icon ? 'fa-' + item.icon : 'fa-home']")
			span.nav-label {{item.label}}
			span.fa.arrow

		ul.nav.nav-second-level(:class="{in: active}")
			router-link(
				v-for="(subItem, i) in item.children"
				:key="i"
				exact
				tag="li"
				:to="subItem.to"
			).tr-3
				a(href="#") {{subItem.label}}
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	@Component({
		props: ['item']
	})
	export default class NavagitionDropdown extends Vue {
		active = false

		open() {
			this.$emit('open')
			this.active = true
		}

		close() {
			this.$emit('close')
			this.active = false
		}

		toggle() {
			this.active ? this.close() : this.open()
		}
	}
</script>

<style lang="sass" scoped>
	.mini-navbar .nav-second-level:not(.in)
		opacity: 0
	.nav-second-level
		max-height: 0
		transition: max-height .5s

		overflow: hidden
		&.in
			max-height: 200px
</style>