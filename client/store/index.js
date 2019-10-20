
// State object
export const state = () => ({
  isAuth: false,
  username: null
});

// Getter functions
export const getters = {
  isLogged: state => state.isAuth,
  getUsername: state => state.username
}

// Mutations
export const mutations = {
  RESET (state) {
    state.isAuth = false;
    state.username =  null;
  },
  SET_IS_AUTH (state, bool) {
    state.isAuth = bool
  },
  SET_USERNAME (state, username) {
    state.username = username
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
      const date = Date.now();
      this.$cookie.set('token', token, { encode: () => {
          btoa(unescape(encodeURIComponent( token )))
        }, maxAge: 60 * 60 * 24 * 30 })
      this.$cookie.set('username', username, { maxAge: 60 * 60 * 60 * 24 * 30 })
      this.$cookie.set('creationDate', date, { maxAge: 60 * 60 * 60 * 24 * 30 })
      state.commit("SET_USERNAME", username)
      state.commit("SET_IS_AUTH", true)
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
