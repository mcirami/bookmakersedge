<template>
	<div class="alert alert-flash"
	     :class="'alert-'+level"
	     role="alert"
	     v-show="show"
	     v-text="body">
	</div>
</template>

<script>
	export default {

		props: ['message'],

		data() {
			return {
				body: '',
				level: 'success',
				show: false
			}
		},

		created() {

			if (this.message) {

				this.flash(this.message)
			}

			window.events.$on('flash', data => {
				this.flash(data)
			})
		},

		methods: {

			flash(data) {
				this.body = data.message;
				this.level = data.level;
				this.show = true;

				this.hide();
			},

			hide() {
				setTimeout(() => {
					this.show = false;

				}, 3000);
			}
		}
	}
</script>

<style>

	.alert-flash {
		position: fixed;
		left: 50%;
		top: 190px;
		margin-left: -158px;
		font-size: 24px;
	}

</style>