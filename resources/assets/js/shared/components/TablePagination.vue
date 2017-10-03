<template lang="pug">
	ul.table-pagination
		li(:class="{disabled: current === 1}")
			a(href="#" @click.prevent="select(1)"): i.fa.fa-lg.fa-angle-double-left

		li(:class="{disabled: current === 1}")
			a(href="#" @click.prevent="select(current - 1)"): i.fa.fa-lg.fa-angle-left

		li(v-if="current > visible" @click="select(current - visible)"): a(href="#" @click.prevent="") ...

		li(
			v-for="index in meta.lastPage"
			v-if="index > current - visible && index < current + visible"
			:class="{disabled: current == index}"
		)
			a(href="#" @click.prevent="select(index)") {{index}}

		li(v-if="lastPage - visible > current" @click="select(current + visible)"): a(href="#" @click.prevent="") ...

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
			meta: {require: true},
			visible: {}
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
		align-items: flex-end
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