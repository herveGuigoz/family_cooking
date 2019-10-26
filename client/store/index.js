const jwtJsDecode = require('jwt-js-decode');
const nowInSeconds = Date.now() / 1000;
// State object
export const state = () => ({
  user: null
});

// Getter functions
export const getters = {
  isAuth (state) {
    return !(!state.user || nowInSeconds > state.user.expire);
  },
  getUser: state => state.user,
};

// Mutations
export const mutations = {
  RESET (state) {
    state.user =  null;
  },
  SET_USER (state, token) {
    try {
      const jwt = jwtJsDecode.jwtDecode(token);
      const username = jwt.payload.username;
      const expire = jwt.payload.exp;
      nowInSeconds < expire ? state.user = { token, username , expire } : state.user = null
    } catch (e) {
      state.user =  null;
    }
  }
};

// Actions
export const actions = {
  reset(state) {
    state.commit("RESET");
  },
  auth(state, token) {
    try {
      this.$cookie.removeAll()
      this.$cookie.set('auth', token, { maxAge: 60 * 60 * 60 * 24 * 30 })
      state.commit('SET_USER', token)
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
