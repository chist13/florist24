<template lang="pug">
	div
		.table-responsive
			table.table.table-striped.table-hover(style='text-align: left')

				thead
					tr
						template(v-for="field in tableFields")
							th(v-if="field.sortField" @click.prevent="sort(field)")
								.sortable
									| {{ field.title }}
									i(v-if="field.sort === 'desc'").fa.pull-right.fa-sort-desc
									i(v-else-if="field.sort === 'asc'").fa.pull-right.fa-sort-asc
									i(v-else='').fa.pull-right.fa-sort

							th(v-else="") {{ field.title }}

				transition-group(:name='transition' tag='tbody')
					tr(v-for='(item, index) in tableData' :key='item.id || index')

						td(v-for='field in tableFields')

							template(v-if="field.name.startsWith('__slot:')")
								slot(:name="field.name.split(':')[1]" :item='item')

							template(v-else='') {{ item[field.name] }}

		div(v-if="hasPagination").d-flex
			info(
				v-if="showInfo"
				ref="info"
				:meta="tableMeta"
				style="margin-right: auto"
			)

			pagination(
				ref="pagination"
				:visible="visible"
				:meta="tableMeta"
				style="margin-left: auto"
				@pageChanged="pageChanged"
			)
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	import Pagination from './TablePagination'
	import Info from './TableInfo'

	@Component({
		props: {
			value: {required: true, type: [Array, Object]},
			fields: {required: true, type: Array},

			search: {default: '', type: String},

			transition: {default: 'list'},

			dataPath: {default: 'data'},
			metaPath: {default: 'meta'},

			showInfo: {default: true, type: Boolean},
			pagination: {default: true, type: Boolean},
			visible: {default: 3}
		},
		components: {
			'pagination': Pagination,
			'info': Info
		},
		watch: {
			search(val) {
				this.update()
			}
		}
	})
	export default class MyTable extends Vue {
		tableFields = []

		loaded = false

		sortParam = null

		get tableData() {
			return this.dataPath === '' ? this.value : this.value[this.dataPath]
		}

		get tableMeta() {
			return this.metaPath === '' ? this.value : this.value[this.metaPath]
		}

		get hasPagination() {
			return this.pagination && this.tableMeta != null
		}

		/**
		 * main method to update the data
		 *
		 * uses saved sortParam, $props.params in every dispatch
		 * can accept props like - {page: 5}
		 */
		update(props = {}) {
			if (this.search) {
				props['q'] = this.search
			}

			if (this.sortParam) {
				props['sort'] = this.sortParam
			}

			this.$emit('input', props)
		}

		/**
		 * update witout changing the page
		 */
		refresh() {
			let props = {page: this.$refs.pagination && this.$refs.pagination.current}

			// if table has no pagination THEM update = refresh
			if (props.page == null) {
				props = {}
			}

			// if table is empty and has prev page THEM redirect to prev page
			if (this.tableData.length === 0 && props.page > 1) {
				props.page--
			}

			this.update(props)
		}

		/**
		 * changed view of the thead and dispatches new props to store
		 */
		sort(field) {
			// get state of the current sort field
			const beforeSortType = field.sort

			// reset all sort fields
			this.tableFields.forEach(e => e.sort = '')

			// update state of the current sort field
			field.sort = beforeSortType === 'desc' ? 'asc' : 'desc'

			// save sort param.. will be used in update method
			this.sortParam = `${field.sortField}|${field.sort}`

			this.update()
		}

		/**
		 * vue's livecycle hook
		 *
		 * transforms $prop.fields to certain form
		 * and update
		 */
		created() {
			this.tableFields = this.fields.map(e => {
				if (typeof e === 'string') {
					return {title: e.charAt(0).toUpperCase() + e.slice(1), name: e}
				}
				this.$set(e, 'sort', '')
				return e
			})

			this.update()
		}

		/**
		 * change page
		 */
		pageChanged(page) {
			this.update({page})
		}
	}
</script>

<style lang="sass" scoped>
	.table
		overflow: hidden

	.table-responsive
		border-top: 0

	.sortable
		color: #1ab394
		cursor: pointer
		display: flex
		justify-content: space-between
		align-items: center

	.d-flex
		display: flex
</style>