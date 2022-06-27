import axios from "axios";

const state = {
    groups: [],
}

const getters = {
    groups: (state) => state.groups,
}

const actions = {
    getGroup({commit}) {
        axios.get(`/api/groups`)
            .then(response => {
                commit('setGroup', response.data);
            })
            .catch(error => {
                console.log("Unable to fetch data : " + error);
            });
    },
    setGroup({commit}, payload) {
        commit('setGroup', payload);
    }
}

const mutations = {
    setGroup(state, data) {
        state.groups = data;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
