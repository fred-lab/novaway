/**
 * Import Vuex
 */
import Vue from 'vue';
import Vuex from 'vuex'

/** Import Axios **/
import axios from 'axios'

Vue.use(Vuex)

/* store the data */
export const state = {
    books: [],
    movies: [],
    needle: '',
    bookIndex: 0,
    movieIndex: 0,
    itemsPerPage: 5
}

/**
 * Search a keyword in an object and return a filtered array
 * @param array
 * @param needle
 * @returns {*}
 * @Private
 */
let filteredList = (array, needle) => {
    if(needle){
        return array.filter(
            book => Object.values(book).find(
                value => value.toString().toLowerCase().includes(state.needle.toString().toLowerCase())
            )
        )
    }
    return array
}

/**
 * Getters to access to the state
 */
export const getters = {
    getBooks: state => filteredList(state.books, state.needle).slice(state.bookIndex, state.bookIndex + state.itemsPerPage),
    getNbBooks: state => filteredList(state.books, state.needle).length,
    getMovies: state => filteredList(state.movies, state.needle).slice(state.movieIndex, state.movieIndex + state.itemsPerPage),
    getNbMovies: state => filteredList(state.movies, state.needle).length,
    getItemsPerPage: state => state.itemsPerPage
}

/**
 * Mutation will modify the state property
 */
export const mutations = {
    SET_BOOKS(state, books){
        state.books = books
    },
    SET_MOVIES(state, movies){
        state.movies = movies
    },
    SET_NEEDLE (state, needle){
        state.needle = needle
    },
    SET_BOOKS_INDEX (state, index){
        state.bookIndex = index
    },
    SET_MOVIES_INDEX (state, index){
        state.movieIndex = index
    }
}

/**
 * Action commit mutation
 */
export const actions = {
    /**
     * Get an Ajax request and set the list of all contacts
     */
    setMedias({commit}){
        axios.get('api/medias').then(
            ({data}) => {
                let medias = JSON.parse(data)
                commit('SET_BOOKS', medias.books)
                commit('SET_MOVIES', medias.movies)
            }
        )
    },
    /**
     * Set the needle
     */
    setNeedle({commit}, needle){
        commit('SET_NEEDLE', needle)
    },
    setBooksIndex({commit}, index){
        commit('SET_BOOKS_INDEX', index)
    },
    setMoviesIndex({commit}, index){
        commit('SET_MOVIES_INDEX', index)
    }
}

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions
})


