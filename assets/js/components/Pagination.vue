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
                itemsPerPage: 5,
                totalPages: 1,
                currentPage: 1
            }
        },
        watch:{
            items(newVal, oldVal){
                this.totalPages = newVal.length
            }
        },
        computed:{
            pages(){
                return Math.ceil(this.totalPages / this.itemsPerPage)
            }
        },
        methods:{
            setPage(page){
                this.currentPage = page
            }
        },
        mounted(){

        }
    }
</script>

<style lang="scss">
    a.first::after {
        content:'...'
    }

    a.last::before {
        content:'...'
    }
</style>