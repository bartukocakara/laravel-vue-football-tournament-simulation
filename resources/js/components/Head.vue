<template>
    <div>
        <b-jumbotron :header="header" >
            <p>{{ description }}</p>
        </b-jumbotron>
    </div>
</template>

<script>
export default {
    name: "Head",
    data(){
        return {
            header:'Soccer League',
        }
    }
}
</script>

<style scoped>

</style>
