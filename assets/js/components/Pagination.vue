<template>
    <ul class="pagination">
        <li class="page-item" :class="{active: currentPage === page}" v-for="page in pages" v-if="Math.abs(page - currentPage) < 3 || page === pages || page === 1">
            <a class="page-link" href="#" @click.prevent="setPage(page)"
               :class="{last: (page === totalPages && Math.abs(page - currentPage) > 3),
                        first:(page === 1 && Math.abs(page - currentPage) > 3)}">
                {{page}}
            </a>
        </li>
    </ul>
</template>

<script type="text/babel">
    export default {
        props:['items'],
        data(){
            return {
                totalPages: 1,
                currentPage: 1
            }
        },
        computed:{
            pages(){
                if(this.items === 'books'){
                    this.totalPages = this.$store.getters.getNbBooks
                }
                if(this.items === 'movies'){
                    this.totalPages = this.$store.getters.getNbMovies
                }

                return Math.ceil(this.totalPages / this.itemsPerPage)
            },
            itemsPerPage(){
                return this.$store.getters.getItemsPerPage
            }
        },
        methods:{
            setPage(page){
                this.currentPage = page

                let index = this.currentPage * this.itemsPerPage - this.itemsPerPage

                if(this.items === 'books'){
                    this.$store.dispatch('setBooksIndex', index)
                }
                if(this.items === 'movies'){
                    this.$store.dispatch('setMoviesIndex', index)
                }
            }
        }
    }
</script>

<style lang="scss">
    .pagination{
        margin-top: 0.5em;
    }

    a.first::after {
        content:'...'
    }

    a.last::before {
        content:'...'
    }
</style>