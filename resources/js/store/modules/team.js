import axios from "axios";

const state = {
    teams: [],
    totalTeam: 0
}

const getters = {
    teams: (state) => state.teams,
    totalTeam: (state) => state.totalTeam,
}

const actions = {
    getTeams({commit}) {
        axios.get(`api/teams`)
            .then(response => {
                commit('setTeam', response.data.data);
                commit('setTotalTeam', response.data.total);
            })
            .catch(error => {
                console.log("Unable to fetch data : " + error);
            });
    },
    setTeams({commit},payload){
        commit('setTeam', payload);
        commit('setTotalTeam', payload.length);
    }
}

const mutations = {
    setTeam(state, data) {
        state.teams = data;
    },
    setTotalTeam(state, data) {
        state.totalTeam = data;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
