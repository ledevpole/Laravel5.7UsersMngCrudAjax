<template id="add-post">
	<div>
		<h3> Add a new Article </h3>
		<form v-on:submit.prevent = "createArticle">


			<div class="form-group">
				<label for="add-title">Title</label>
				<input id="add-title" v-model="article.title" class="form-control" required>

			</div>

			<div class="form-group">
				<label for="add-body">Body</label>
				<textarea id="add-body" v-model="article.body" row="10" class="form-control" required></textarea>

			</div>


		<button type="submit" class="btn btn-xs btn-primary">Create Article</button>

		<router-link class="btn btn-xs btn-warning" v-bind:to="'/articleHome'">Cancel</router-link>


		</form>
	</div>
</template>

<script>
	export default {
		data: function () {
		return {article: {title: '', body: ''}}
		},
		methods: {
			createArticle: function() {
			let uri = 'http://blog/articles';
			Axios.post(uri,this.article).then((response) => {
					this.$router.push({name: 'ListArticles'})
				}).catch(function (error) {
                       console.log(error.response);
                   });
			}
		}
	}
</script>