<template>

	<button name="picks_delete" class="button red w-100 d-block" @click="destroy">Delete</button>

</template>

<script>
	export default {

		name: 'DaletePick',

		props: ['pickId'],

		methods: {

			destroy() {

				axios.post('/submit-picks/' + this.pickId)
				.then(function (response) {
					window.location.reload();
					flash('Your Pick Has Been Deleted');
				})
				.catch(function (error) {
					console.log(error);
				});
				/*this.$emit('deleted', this.pickId);*/
			},
		}
	};
</script>

<style scoped>

</style>