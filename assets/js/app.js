import Vue from 'vue';
window.Vue = Vue;

/* Import Store */
import store from './store.js';

/* Import Router */
import router from './routes.js';

/* Add web component */
Vue.component('novaway-app', require('./components/NovawayApp.vue').default);
Vue.component('homepage', require('./components/Homepage.vue').default);
Vue.component('books-list', require('./components/BooksList.vue').default);
Vue.component('book-detail', require('./components/BookDetail.vue').default);
Vue.component('movies-list', require('./components/MoviesList.vue').default);
Vue.component('movie-detail', require('./components/MovieDetail.vue').default);
Vue.component('breadcrumb', require('./components/Beadcrumb.vue').default);
Vue.component('searchbox', require('./components/SearchBox.vue').default);
Vue.component('pagination', require('./components/Pagination.vue').default);

/* Initializing Vue */
const app = new Vue({
    el: '#app',
    store,
    router,
    created(){
        console.log('Fetch Data')
        this.$store.dispatch('setMedias')
    },
    mounted () {
        console.log('App is ready')
    }
});