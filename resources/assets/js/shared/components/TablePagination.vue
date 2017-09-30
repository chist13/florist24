<template lang="pug">
	ul.table-pagination
		li(:class="{disabled: current === 1}")
			a(href="#" @click.prevent="select(1)"): i.fa.fa-lg.fa-angle-double-left

		li(:class="{disabled: current === 1}")
			a(href="#" @click.prevent="select(current - 1)"): i.fa.fa-lg.fa-angle-left

		li(
			v-for="index in meta.lastPage"
			:class="{disabled: current == index}"
		)
			a(href="#" @click.prevent="select(index)") {{index}}

		li(:class="{disabled: current === lastPage}")
			a(href="#" @click.prevent="select(current + 1)"): i.fa.fa-lg.fa-angle-right

		li(:class="{disabled: current === lastPage}")
			a(href="#" @click.prevent="select(lastPage)"): i.fa.fa-lg.fa-angle-double-right
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	@Component({
		props: {
			meta: {require: true}
		}
	})
	export default class TablePagination extends Vue{
		get current() {
			return this.meta.currentPage
		}

		get lastPage() {
			return this.meta.lastPage
		}

		select(page) {
			this.$emit('pageChanged', page)
		}

	}
</script>

<style lang="sass" scoped>
	.table-pagination
		display: flex
		list-style: none
		margin-bottom: 0
		padding-left: 0

		>li

			>a
				height: 25px
				display: flex
				justify-content: center
				align-items: center
				width: 25px

			&.disabled
				pointer-events: none
				>a
					color: grey
</style>