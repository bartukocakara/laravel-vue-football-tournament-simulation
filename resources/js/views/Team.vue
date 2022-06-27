<template>
    <div>
        <b-card>Total Team Count : {{ totalTeam }}</b-card>
        <b-table striped hover :items="teams" :fields="fields"></b-table>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    name: "Team",
    data() {
        return {
            fields: [
                {key: 'name', label:'Team Name'},
                {key: 'scored_goal',label:'Goals Scored'},
                {key: 'conceded_goal', label:'Goals Conceded'},
                {key: 'point',label:'Point'},
                {key: 'capability',label:'Ability Percentage'},
                {key: 'created_at',label:'Creation Date'},
            ]
        }
    },
    computed: {
        ...mapGetters({
            teams: 'teams',
            totalTeam: 'totalTeam'
        }),
    },
    created() {
        this.fetchTeams()
    },
    methods: {
        ...mapActions({getTeams: 'getTeams'}),
        fetchTeams() {
            return this.getTeams();
        }
    }
}
</script>

<style scoped>

</style>
