<template>
	<div style="text-align: center; max-width: 350px; margin: auto">
        <br>
		<h1>florist24</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci asperiores atque, dignissimos esse eveniet excepturi impedit magni nisi numquam officia officiis optio provident quaerat quisquam recusandae reiciendis, sapiente tempore.</p>
		<br>
	</div>
</template>

<script>
    import Component from 'vue-class-component'
    import Vue from 'vue'

	import animatable from '../mixins/animatable'

    @Component({
		mixins: [animatable]
	})
    export default class Home extends Vue {
		activated() {
            this.animate('fadeInUp')
        }
	}
</script>

<style></style>