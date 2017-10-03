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
						button(@click="$refs.modal.toggle()").btn.btn-primary create new

				br

				vue-tabs
					v-tab(title="My Table" icon="fa fa-user")
						my-table(
							:fields="fields"
							:search="search"
							v-model="clients"
							ref="table"
						)
							template(slot="name" scope="{item}")
								a(@click.prevent="select(item)" href="#") {{item.name}}

							template(slot="gender" scope="{item}")
								span(:style="{color: item.gender === 'F' ? 'firebrick' : 'forestgreen'}") {{item.gender}}

							template(slot="controls" scope="{item}")
								my-button(@click.native="destroy(item.id)") destroy

					v-tab(title="nothing" icon="fa fa-briefcase")
						| nothing

			.col-sm-4
				client-panel
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
		get clients() {
			return this.$store.getters['clients/items']
		}

		set clients(value) {
			return this.$store.dispatch('clients/all', value)
		}

		search = ''

		fields = [
			{name: '__slot:name', title: 'Name', sortField: 'name'},
			'email',
			'nickname',
			{name: '__slot:gender', title: 'Gender', sortField: 'gender'},
			{name: '__slot:controls'}
		]

		select(data) {
			this.$store.commit('clients/SELECT', data)
		}

		async destroy(id) {
			try {
				await this.$store.dispatch('clients/destroy', id)

				this.$refs.table.refresh()

				this.$snotify.success('Deleted was successful', 'Try once more!', {timeout: 2000})
			} catch (e) {
				this.$snotify.error('Something is wrong', 'Try reload the page', {timeout: 4000, pauseOnHover: true})
			}
		}
	}
</script>