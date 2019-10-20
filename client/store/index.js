
// State object
export const state = () => ({
  user: null
});

// Getter functions
export const getters = {
  isAuth: state => state.user,
  getUser: state => state.user,
}

// Mutations
export const mutations = {
  RESET (state) {
    state.user =  null;
  },
  SET_USER (state, auth) {
    state.user = auth
  }
}

// Actions
export const actions = {
  reset(state) {
    state.commit("RESET");
  },
  auth(state, { token, username }) {
    try {
      this.$cookie.removeAll()
      const lastLogin = Date.now();
      const user = { token, username, lastLogin }
      this.$cookie.set('auth', user, { maxAge: 60 * 60 * 60 * 24 * 30 })
      state.commit('SET_USER', user)
    } catch (e) {
      throw new Error(e.message)
    }
  },
  fetchVariable1({ commit }) {
    return new Promise( (resolve, reject) => {
      // Make network request and fetch data
      // and commit the data
      //ex: commit('SET_VARIABLE_1', data);
      resolve();
    })
  },
}
