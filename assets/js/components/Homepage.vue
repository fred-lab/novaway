<template>
    <div class="homepage">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Moteur de recherche</h1>
                <p class="text-muted">Cette application vous permet de retrouver des livres ou DVD/Bluray à partir d'une liste !</p>
            </div>
        </div>
        <searchbox></searchbox>
        <div class="row text-center placeholder">
            <div class="col-md-6">
                <h2>Listes des livres <span class="badge badge-pill badge-info">{{ nbBooks }}</span></h2>
                <books-list></books-list>
            </div>
            <div class="col-md-6">
                <h2>Listes des DVD/Bluray <span class="badge badge-pill badge-info">{{ nbMovies }}</span></h2>
                <movies-list></movies-list>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        computed:{
            nbBooks(){
                return this.$store.getters.getNbBooks
            },
            nbMovies(){
                return this.$store.getters.getNbMovies
            }
        }
    }
</script>

<style lang="scss">
    .homepage{
        margin: 1em 0em 6em;
    }
</style>