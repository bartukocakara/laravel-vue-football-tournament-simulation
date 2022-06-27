<template>
    <div>
        <b-card>
            <b-button variant="success" @click="playAllMatches()">
                Play Simulation
            </b-button>
        </b-card>
        <b-card :title="title(week)" :key="week" v-for="(groups,week) in groups">
            <b-card-text>
                <b-table fixed striped hover :items="groups" :fields="fields"></b-table>
            </b-card-text>
        </b-card>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Group",
    data() {
        return {
            fields: [
                {
                    key: "home_team",
                    label: "Home Team"
                },
                {
                    key: "home_team_goal",
                    label: "Home Team Goals"
                },
                {
                    key: "away_team_goal",
                    label: "Away Team Goals"
                },
                {
                    key: "away_team",
                    label: "Away Team"
                },
                {
                    key: "created_at",
                    label: "Match Date"
                },

            ],
        }
    },
    computed: {
        ...mapGetters({
            groups: 'groups'
        })
    },
    created() {
        this.fetchGroup()
    },
    methods: {
        ...mapActions({getGroup: 'getGroup'}),
        fetchGroup() {
            return this.getGroup();
        },
        title(item) {
            return item + '. Week';
        },
        playAllMatches() {
            axios.post('/api/matches')
                .then((response) => {
                    location.reload()
                })
                .catch((error) => console.log(error))
        },
    }
}
</script>

<style scoped>

</style>
