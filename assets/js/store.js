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
    medias: []
}

/*
 * Getters to access to the state
 */
export const getters = {
    getMedias : state => state.medias
}

/*
 * Mutation will modify the state property
 */
export const mutations = {
    SET_MEDIAS (state, medias){
        state.medias = medias
    }
}

/*
 * Action commit mutation
 */
export const actions = {
    /*
     * Get an Ajax request and set the list of all contacts
     */
    setMedias({commit}){
        axios.get('api/medias').then(
            ({data}) => {
                commit('SET_MEDIAS', JSON.parse(data))
            }
        )
    }
}

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions
})


