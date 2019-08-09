<template>

	<div v-if="editing">
		<div class="row update_grade_form no-gutters">
			<img class="cancel_grade_update" :src="'images/close-button.png'" alt="" @click="cancelGrade">
			<div class="col-12">
				<div class="form-group row no-gutters mb-0">
					<select class="form-control col-5 mr-4 mr-lg-3 mr-xl-4" name="grade" id="grade" v-model="grade">
						<option value=""></option>
						<option value="w">Win</option>
						<option value="l">Lose</option>
						<option value="p/c">Push/Cancelled</option>
					</select>
					<button name="picks_update" id="picks_update" class="ml-auto grade_update button red col-6" @click="updateGrade">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div v-else>
		<div class="grade_info">
			<div class="row no-gutters">
				<p class="text-left col-5 text-capitalize mb-0" v-text="grade"></p>
				<button name="edit_grade" class="button black d-block edit_grade mr-3" @click="editing = true">Edit</button>
				<button name="pick_delete" class="button yellow d-block delete_pick" @click="destroy">Delete</button>
			</div>
		</div>
	</div>

</template>

<script>

	import collection from '../mixins/collection';

	export default {

		props: ['attributes'],

		mixins: [collection],

		data() {
			return {
				editing: false,
				sport: this.attributes.sport,
				team: this. attributes.team,
				line: this.attributes.line,
				game_time: this.attributes.game_time,
				comment: this.attributes.comment,
				grade: this.attributes.grade

			}
		},

		methods: {

			update() {
				axios.patch('/submit-picks/' + this.attributes.id + '/update', {
					sport: this.sport,
					team: this.team,
					line: this.line,
					game_time: this.game_time,
					comment: this.comment,
				})
				.then(() => {
					this.editing = false;
					flash('Pick has been updated');
				})
				.catch(error => {
					//message = error.response.data['message']['errors']['team'][0];
					flash(error.response.data, 'danger');
					this.editing = true;
				});
			},

			cancel() {
				this.editing = false;
				this.sport = this.attributes.sport;
				this.team = this.attributes.team;
				this.line = this.attributes.line;
				this.game_time = this.attributes.game_time;
				this.comment = this.attributes.comment;
			},

			updateGrade() {
				axios.patch('/grade-picks/' + this.attributes.id + '/update', {
					grade: this.grade
				})
				.then(() => {
					this.editing = false;
					flash('Pick grade has been saved');
				})
				.catch(error => {
					//message = error.response.data['message']['errors']['team'][0];
					flash(error.response.data, 'danger');
					this.editing = true;
				});
			},

			cancelGrade() {
				this.editing = false;
				this.grade = this.attributes.grade;
			},

			destroy() {
				axios.delete('/submit-picks/' + this.attributes.id + '/delete')
				.then(() => {
					$(this.$el.closest('.form-group')).fadeOut(300, function() {
						flash('Pick has been deleted');
					}).remove();
					//$(this.$el).closest('.icon_wrap').css('display', 'none');
				})
				.catch(error => {
					flash(error.response.data, 'danger');
				});
			}
		}
	};

</script>