// State object
const initialState = () => ({
  authenticated: false,
  email: null,
  token: null,
  tokenExpirationDate: null
});

const state = initialState();

// Getter functions
const getters = {
  isAuthenticated: state => state.authenticated,
  getEmail: state => state.email,
  getToken: state => state.token,
  getTokenExpirationDate: state => state.tokenExpirationDate
}

// Mutations
const mutations = {
  RESET (state) {
    state = initialState();
  },
  SET_AUTHENTICATED (state) {
    state.authenticated = true
  },
  SET_EMAIL (state, email) {
    state.email = email
  },
  SET_TOKEN (state, token) {
    state.token = token
  },
  SET_TOKEN_EXPIRATION_DATE (state, date) {
    state.tokenExpirationDate = date
  }
}

// Actions
const actions = {
  reset({ commit }) {
    commit('RESET');
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
