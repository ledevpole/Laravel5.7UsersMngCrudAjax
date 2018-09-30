<template id="delete-article">
	<div>
		<h3> Delete Article {{article.title}} </h3>
		<form v-on:submit.prevent = "deleteArticle">

		<p> The action cannot be undone </p>

		<button type="submit" class="btn btn-xs btn-danger">Delete Article</button>

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
			let uri = 'http://blog/articles/'+this.$route.params.id;
			Axios.get(uri).then((response) => {
	            this.article = response.data;
	        });
		},
		methods: {
			deleteArticle: function() {
				let uri = 'http://blog/articles/'+this.$route.params.id;
				Axios.delete(uri,this.article).then((response) => {
					this.$router.push({name: 'ListArticles'})
				}).catch(function (error) {
                       console.log(error.response);
                });
			}
		}
	}
</script>