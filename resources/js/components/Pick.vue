<template>

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
				grade: this.attributes.grade != null ? this.attributes.grade : 'not graded'

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
					grade: this.grade
				})
				.then(() => {
					this.editing = false;
					flash('Pick has been updated');
				})
				.catch(error => {
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
				this.grade = this.attributes.grade != null ? this.attributes.grade : 'not graded'
			},

			destroy() {
				axios.delete('/submit-picks/' + this.attributes.id + '/delete')
				.then(() => {
					$(this.$el.closest('.pick_row')).fadeOut(300, function() {
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