<template>
    <div>
        <nav class="breadcrumb navigation">
            <a href="/login"  class="btn .btn-lg btn-outline-success admin">Login</a>
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
    .navigation{
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        .admin{
            align-self: flex-end;
        }
    }
</style>