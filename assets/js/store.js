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
    medias: [],
    filteredList: {},
    needle: ''
}

/**
 * Getters to access to the state
 */
export const getters = {
    /**
     * Get the list of media or the list filtered by a search
     *
     * @param state
     * @returns {*}
     */
    getMedias : state => {
        if(state.needle){
            let filterList = (array) => {
                return array.filter(
                    book => Object.values(book).find(
                            value => value.toString().toLowerCase().includes(state.needle.toString().toLowerCase())
                        )
                )
            }

            state.filteredList.books = filterList(state.medias.books)
            state.filteredList.movies = filterList(state.medias.movies)

            return state.filteredList
        }
        return state.medias
    }
}

/**
 * Mutation will modify the state property
 */
export const mutations = {
    SET_MEDIAS (state, medias){
        state.medias = medias
    },
    SET_NEEDLE (state, needle){
        state.needle = needle
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
                commit('SET_MEDIAS', JSON.parse(data))
            }
        )
    },
    /**
     * Set the needle
     */
    setNeedle({commit}, needle){
        commit('SET_NEEDLE', needle)
    }
}

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions
})


