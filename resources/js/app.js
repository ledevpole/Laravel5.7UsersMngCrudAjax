
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;



let AppLayout = require('./components/AppComponent.vue');

const ListArticles = Vue.component('ListArticles',require('./components/ListArticles.vue'));

const AddArticle = Vue.component('AddArticle',require('./components/AddArticle.vue'));

const EditArticle = Vue.component('EditArticle',require('./components/EditArticle.vue'));

const DeleteArticle = Vue.component('DeleteArticle',require('./components/DeleteArticle.vue'));

const ViewArticle = Vue.component('ViewArticle',require('./components/ViewArticle.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //registering modules

 Vue.use(VueRouter,VueAxios,axios);


const routes = [
{
	name: 'ListArticles',
	path: '/articleHome',
	component: ListArticles
},
{
	name: 'AddArticle',
	path: '/add-article',
	component: AddArticle
},
{
	name: 'EditArticle',
	path: '/edit/:id',
	component: EditArticle
},
{
	name: 'DeleteArticle',
	path: '/article-delete',
	component: DeleteArticle
},
{
	name: 'ViewArticle',
	path: '/view/:id',
	component: ViewArticle
}
];

 const router = new VueRouter({mode: 'history', routes: routes});

 new Vue( Vue.util.extend(
 	{ router },
 	AppLayout
 	)
 ).$mount('#articles');