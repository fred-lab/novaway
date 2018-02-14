<template>
    <div class="row text-center placeholder searchbox">
        <input type="text" class="form-control" v-model="needle" placeholder="Rechercher un livre ou DVD/Bluray">
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return {
                needle: ''
            }
        },
        watch: {
            needle(newNeedle, oldNeedle){
                this.$store.dispatch('setNeedle', newNeedle)
            }
        }
    }
</script>

<style lang="scss">
    .searchbox{
        margin: 3em 0em;
    }
</style>