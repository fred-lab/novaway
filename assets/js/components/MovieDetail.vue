<template>
    <div class="list-group">
        <h2>Detail du DVD/Bluray :</h2>

        <div class="list-group">
            <p class="list-group-item">Titre : {{ movie.title }}</p>
            <p class="list-group-item">Auteur : {{ movie.director }}</p>
            <div class="list-group-item">
                <p>Résumé :</p>
                <p>{{ movie.resume }}</p>
            </div>
            <p class="list-group-item">Acteurs : {{ movie.actors}}
            </p>
            <p class="list-group-item">Date de sortie : {{ movie.releaseDate}}</p>
            <p class="list-group-item">Durée : {{ movie.duration }}</p>
            <p class="list-group-item">N° ISAN : {{ movie.isan }}</p>
            <p class="list-group-item">Prix : {{ movie.price }}</p>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return {}
        },
        computed: {
            movie(){
                return this.$store.getters.getMovies.filter(movie => movie.title === this.$route.params.title)[0]
            }
        }
    }
</script>

<style lang="scss">

</style>