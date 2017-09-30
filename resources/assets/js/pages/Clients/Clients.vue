<template lang="pug">
	#clients-page
		client-modal(ref="modal")

		.row.wrapper.border-bottom.white-bg.page-heading
			.col-lg-10
				h2 Clients
				ol.breadcrumb
					li: a(href="#" '@click.prevent'="$router.push({name: 'home'})") Home
					li.active: strong Clients
			.col-lg-2

		.row.wrapper.wrapper-content
			.col-sm-8: .ibox-content: .ibox: .clients-list
				.input-group
					input.input.form-control(placeholder="Search client" v-model="search")
					span.input-group-btn
						button.btn.btn-primary: i.fa.fa-search Search

				div(style="margin: 20px 0")
					my-button(@click.native="$refs.modal.toggle()") Create

				vue-tabs
					v-tab(title="My Table" icon="fa fa-user")
						my-table(:fields="fields" store="clients" ':params'="{q: search}")
							template(slot="name" scope="{item}")
								a(@click.prevent="selected = item" href="#") {{item.name}}

							template(slot="gender" scope="{item}")
								span(:style="{color: item.gender === 'F' ? 'firebrick' : 'forestgreen'}") {{item.gender}}

							template(slot="controls" scope="{item}")
								my-button(@click.native="destroy(item.id)") destroy

					v-tab(title="nothing" icon="fa fa-briefcase")

			.col-sm-4
				client-panel(:user="selected")
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	import ClientPanel from './ClientPanel'
	import ClientModal from './ClientModal'

	@Component({
		components: {
			'client-panel': ClientPanel,
			'client-modal': ClientModal
		}
	})
	export default class Clients extends Vue {
		selected = {}

		search = ''

		fields = [
			{name: '__slot:name', title: 'Name', sortField: 'name'},
			'email',
			'nickname',
			{name: '__slot:gender', title: 'Gender', sortField: 'gender'},
			{name: '__slot:controls'}
		]

		async destroy(id) {
			try {
				await this.$store.dispatch('clients/destroy', id)

				this.$snotify.success('Deleted was successful', 'Try once more!', {timeout: 2000})
			} catch (e) {
				this.$snotify.error('Something is wrong', 'Try reload the page', {timeout: 4000, pauseOnHover: true})
			}
		}
	}
</script>