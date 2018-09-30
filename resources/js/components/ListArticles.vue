<template id="article-list">
    <div class="row">
        <div class="ml-auto">
            <router-link class="btn btn-xs btn-primary" v-bind:to="{path: '/add-article'}">
                Add new Article
            </router-link>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Article Title </th>
                    <th class="col-md-6"> Article Body </th>
                    <th> Author </th>
                    <th class="col-md-3"> Actions </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(article, index) in fiteredArticles">
                    <td> {{ index +1 }}</td>
                    <td> {{ article.title }}</td>
                    <td> {{ article.body }}</td>
                    <td> {{ article.name }}</td>
                    <td> 
                    <router-link class="btn btn-xs btn-info" v-bind:to="{name: 'ViewArticle', params: { id:  article.id }}">Show</router-link>
                    <router-link class="btn btn-xs btn-warning" v-bind:to="{name: 'EditArticle', params: { id:  article.id }}">Edit</router-link>
                    <router-link class="btn btn-xs btn-danger" v-bind:to="{name: 'DeleteArticle', params: { id:  article.id }}">Delete</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
        return {articles: ''};
        },
        created: function() {
        let uri= 'http://blog/articles';
        Axios.get(uri).then((response) => {
            this.articles = response.data;
        });
        },
        computed: {
            fiteredArticles: function() {
                if(this.articles.length) {
                return this.articles;
                }
            }
        }
    }
</script>
