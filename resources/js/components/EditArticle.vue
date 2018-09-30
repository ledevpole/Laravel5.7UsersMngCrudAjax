<template id="edit-article">
	<div>
		<h3> Edit an Article </h3>
		<form v-on:submit.prevent = "updateArticle">


			<div class="form-group">
				<label for="edit-title">Title</label>
				<input id="edit-title" v-model="article.title" class="form-control" required>

			</div>

			<div class="form-group">
				<label for="edit-body">Body</label>
				<textarea id="edit-body" v-model="article.body" row="10" class="form-control" required></textarea>

			</div>


		<button type="submit" class="btn btn-xs btn-primary">Update Article</button>

		<router-link class="btn btn-xs btn-warning" v-bind:to="'/articleHome'">Cancel</router-link>


		</form>
	</div>
</template>

<script>
	export default {
		data: function () {
		return {article: {title: '', body: ''}}
		},
		created: function() {
			let uri = 'http://blog/articles/'+this.$route.params.id+'/edit';
			Axios.get(uri).then((response) => {
	            this.article = response.data;
	        });
		},
		methods: {
			updateArticle: function() {
				let uri = 'http://blog/articles/'+this.$route.params.id;
				Axios.patch(uri,this.article).then((response) => {
					this.$router.push({name: 'ListArticles'})
				}).catch(function (error) {
                       console.log(error.response);
                });
			}
		}
	}
</script>