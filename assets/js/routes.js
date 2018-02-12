/**
 * Import Vue-Router
 */
import VueRouter from 'vue-router';

import Vue from 'vue';
Vue.use(VueRouter);

const routes = [
    /** Homepage **/
    {
        path: '/',
        name: 'homepage',
        component: require('./components/Homepage.vue').default
    },
    /** Book detail **/
    {
        path: '/book/:title',
        name: 'book_detail',
        component: require('./components/BookDetail.vue').default,
        prop: true
    },
    /** Movie detail **/
    {
        path: '/movie/:title',
        name: 'movie_detail',
        component: require('./components/MovieDetail.vue').default,
        prop: true
    }
];

export default new VueRouter({
    mode: 'history',
    routes
});
