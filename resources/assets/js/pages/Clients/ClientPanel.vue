<template lang="pug">
	.ibox(v-show="hasUser"): .ibox-content(v-animate:fadeInRight="user.id")
		.tab-content
			#contact-1.tab-pane.active
				.row.m-b-lg
					.col-lg-4.text-center
						h3(v-editable:name="edited" v-text="user.name")

						.m-b-sm
							img.img-circle(alt="image" src="http://webapplayers.com/inspinia_admin-v2.7.1/Angular/img/a2.jpg" style="width: 62px")

						h4(v-editable:nickname="edited" v-text="user.nickname")

					.col-lg-8
						strong About me
						p Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						my-button: i.fa.fa-envelope Send Message

				.client-detail
					.full-height-scroll
						strong Last activity

						ul.list-group.clear-list
							li.list-group-item.fist-item
								span.pull-right 09:00 pm
								| Please contact me
							li.list-group-item
								span.pull-right 10:16 am
								| Sign a contract
							li.list-group-item
								span.pull-right 08:22 pm
								| Open new shop
							li.list-group-item
								span.pull-right 11:06 pm
								| Call back to Sylvia
							li.list-group-item
								span.pull-right 12:00 am
								| Write a letter to Sandra

						strong Notes
						p Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
</template>

<script>
	import Component from 'vue-class-component'
	import Vue from 'vue'

	@Component()
	export default class ClientPanel extends Vue {
		get user() {
			return this.$store.getters['clients/selected']
		}

		get hasUser() {
			return Object.keys(this.user).length
		}

		async edited(key, value) {
			let temp = Object.assign({}, this.user, {[key]: value})

			await this.$store.dispatch('clients/updateSelected', temp)

			this.$snotify.success(`You have changed '${key}-field' to '${value}'`, null, {
				timeout: 2000,
				pauseOnHover: true
			})
		}
	}
</script>