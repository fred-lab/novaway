<template>
    <div class="list-group">
        <router-link v-for="movie in movies"
                     :key="movie.id"
                     :to="{ name: 'movie_detail', params: { title: movie.title }}"
                     class="list-group-item list-group-item-action">
            {{ movie.title }} de {{ movie.director }}
        </router-link>
        <pagination items="movies"></pagination>
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return {}
        },
        computed:{
            movies(){
                // return this.$store.getters.getMedias.movies
                return this.$store.getters.getMovies
            }
        }
    }
</script>

<style lang="scss">

</style>