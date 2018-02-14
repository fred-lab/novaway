<template>
    <div class="list-group">
        <h2>Detail du livre :</h2>

        <div class="list-group">
            <p class="list-group-item">Titre : {{ book.title }}</p>
            <p class="list-group-item">Auteur : {{ book.author }}</p>
            <div class="list-group-item">
                <p>Résumé :</p>
                <p>{{ book.resume }}</p>
            </div>
            <p class="list-group-item">Date de parution : {{ book.releaseDate}}</p>
            <p class="list-group-item">Nombre de page : {{ book.pages }}</p>
            <p class="list-group-item">prix : {{ book.price }}</p>
            <p class="list-group-item">N° ISNB : {{ book.isnb }}</p>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return {}
        },
        computed: {
            book(){
                return this.$store.getters.getBooks.filter(book => book.title === this.$route.params.title)[0]
            }
        }
    }
</script>

<style lang="scss">

</style>