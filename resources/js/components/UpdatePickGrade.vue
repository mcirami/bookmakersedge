<template>

	<div v-if="editing">
		<select class="form-control" name="this.pickId" :pick-id="this.pickId" id="this.pickId" >
			<option value=NULL></option>
			<option value="w">Win</option>
			<option value="l">Lose</option>
			<option value="p/c">Push/Cancelled</option>
		</select>
		<button class="btn btn-xs btn-primary" @click="update">Update</button>
		<button class="btn btn-xs btn-link" @click="cancel">Cancel</button>
	</div>
	<button v-else name="update_grade" class="button black w-100 d-block" @click="editing = true">Edit</button>

</template>


<script>
	export default {
		name: 'UpdatePickGrade',

		props: ['data'],

		data() {
			return {
				editing: false,
				pickId: this.data.id,
				value: this.data.value
			}
		},

		methods: {

			update() {

				axios.patch('/grade-picks/' + this.pickId)
				.then(function (response) {
					window.location.reload();
					flash('Your Pick Grade Has Been Updated');
				})
				.catch(function (error) {
					console.log(error);
				});
				/*this.$emit('deleted', this.pickId);*/
			},

			cancel() {
				this.editing = false;
			}
		}
	};
</script>

<style scoped>

</style>