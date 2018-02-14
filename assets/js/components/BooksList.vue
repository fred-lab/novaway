<template>
    <div class="list-group">
        <router-link v-for="book in books" :key="book.id" :to="{ name: 'book_detail', params: { title: book.title }}"
                     class="list-group-item list-group-item-action">
            {{ book.title }} de {{ book.author }}
        </router-link>

        <pagination items="books"></pagination>
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return {}
        },
        computed:{
            books(){
                return this.$store.getters.getBooks
            }
        }
    }
</script>

<style lang="scss">

</style>