<template lang="pug">
	div.dropdown(:class="{open: active}")

		div(@click="toggle")
			slot(name="trigger") dropdown

		slot
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	@Component
	export default class Dropdown extends Vue {
		active = false

		mounted() {
			const vnode = this.$slots.default.find(({elm}) => elm.nodeType == 1)

			if (vnode) {
				vnode.elm.classList.add('dropdown-menu')
			}
		}

		open() {
			this.active = true
			document.addEventListener('click', this._onOutsideClick)
		}

		close() {
			this.active = false
			document.removeEventListener('click', this._onOutsideClick)
		}

		toggle() {
			this.active ? this.close() : this.open()
		}

		_onOutsideClick(event) {
			this.$el.contains(event.target) || this.close()
		}
	}
</script>

<style lang="sass" scoped></style>