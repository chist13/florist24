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

				transition-group(:name='transition', tag='tbody')
					tr(v-for='(item, index) in tableData', :key='item.id || index')

						td(v-for='field in tableFields')

							template(v-if="field.name.startsWith('__slot:')")
								slot(:name="field.name.split(':')[1]", :item='item')

							template(v-else='') {{ item[field.name] }}

		pagination(
			v-if="hasPagination"
			ref="pagination"
			:meta="tableMeta"
			@pageChanged="pageChanged"
		)
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	import Pagination from './TablePagination'

	import debounce from 'lodash/debounce'

	@Component({
		props: {
			fields: {required: true, type: Array},
			store: {required: true},
			params: {default: {q: ''}, type: Object},
			transition: {default: 'list'},
			storePath: {default: 'all'},
			resourcePath: {default: 'items'},
			dataPath: {default: 'data'},
			metaPath: {default: 'meta'},
			pagination: {default: true, type: Boolean}
		},
		components: {
			'pagination': Pagination
		},
		watch: {
			params: {
				deep: true,
				handler(val, oldval) {
					// if value didn't change we wouldn't update data
					if (JSON.stringify(val) !== JSON.stringify(oldval))
						this.debouncedUpdate()
				}
			}
		}
	})
	export default class MyTable extends Vue {
		tableFields = []

		debouncedUpdate = null

		sortParam = null

		get resource() {
			return this.$store.getters[`${this.store}/${this.resourcePath}`]
		}

		get tableData() {
			return this.resource[this.dataPath]
		}

		get tableMeta() {
			return this.resource[this.metaPath]
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
			(this.sortParam != null) && (props.sort = this.sortParam)

			Object.assign(props, this.params)

			this.$store.dispatch(`${this.store}/${this.storePath}`, props)
		}

		/**
		 * update witout changing the page
		 */
		refresh() {
			this.update({page: this.$refs.pagination.current})
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
		 * creates a debounces dispatch for limiting ajax requests
		 * the first dispatch to store to get data
		 */
		created() {
			this.tableFields = this.fields.map(e => {
				if (typeof e === 'string') {
					return {title: e.charAt(0).toUpperCase() + e.slice(1), name: e}
				}
				this.$set(e, 'sort', '')
				return e
			})

			this.debouncedUpdate = debounce(this.update.bind(this), 600)

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
</style>