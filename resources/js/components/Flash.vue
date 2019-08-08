<template>
	<div class="alert alert-flash"
	     :class="'alert-success'"
	     role="alert"
	     v-show="show"
	     v-text="body">
	</div>
</template>
<!--:class="'alert-'+level"-->
<script>
	export default {

		props: ['message'],

		data() {
			return {
				body: '',
				//level: 'success',
				show: false
			}
		},

		created() {

			if (this.message) {

				this.flash(this.message)
			}

			window.events.$on('flash', message => {
				this.flash(message)
			})
		},

		methods: {

			flash(data) {
				this.body = data;
				//this.level = data.level;
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