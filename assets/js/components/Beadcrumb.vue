<template>
    <div>
        <nav class="breadcrumb">
            <!--<a href="#" class="breadcrumb-item active">Index</a>-->
            <router-link :to="{ name: 'homepage'}" class="breadcrumb-item active">Index</router-link>
        </nav>
    </div>
</template>

<script type="text/babel">
    export default {
        data(){
            return {}
        }
    }
</script>

<style lang="scss">

</style>