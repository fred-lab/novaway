import Vue from 'vue';
window.Vue = Vue;

import store from './store.js'

/* Initializing Vue */
const app = new Vue({
    el: '#app',
    store,
    created(){
        this.$store.dispatch('setMedias')
    },
    mounted () {
        console.log('App is ready')
    }
})