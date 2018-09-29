<template id="article">
	<div>
		<h3>{{article.title}}</h3>
		<strong>Body :</strong>
		<div>
			{{article.body}}
		</div>
		<router-link class="btn btn-xs btn-success" v-bind:to="'/articleHome'">Back to the list</router-link>
	</div>
</template>

<script>
    export default {
        data: function () {
        return {article: ''};
        },
        created: function() {
	        let uri= 'http://blog/articles/'+this.$route.params.id;
	        Axios.get(uri).then((response) => {
	            this.article = response.data;
	        });
        }
        
      }
</script>