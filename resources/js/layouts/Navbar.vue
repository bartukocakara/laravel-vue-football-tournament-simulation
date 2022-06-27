<template>
    <div>
        <b-navbar toggleable="md" type="dark" variant="primary">
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item>
                        <router-link :to="{ name:'teams' }" tag="li">
                            Teams
                        </router-link>
                    </b-nav-item>
                    <b-nav-item>
                        <router-link :to="{ name:'groups' }" tag="li">
                            Groups
                        </router-link>
                    </b-nav-item>
                    <b-nav-item @click="generate()">
                        New Season
                    </b-nav-item>
                </b-navbar-nav>

            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: "Navbar",
    methods: {
        generate() {
            axios.post('/api/generate')
                .then((response) => {
                    this.$store.dispatch('setTeams', response.data.teams);
                    this.$store.dispatch('setGroup', response.data.groups);
                    location.reload();
                })
                .catch((error) => console.log(error))
        }
    }
}
</script>

<style scoped>
.noLink {
    text-decoration: none;
    color: white
}
</style>
