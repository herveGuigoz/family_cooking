const jwtJsDecode = require('jwt-js-decode')
const nowInSeconds = Date.now() / 1000
const decodeJWT = function (token) {
  const jwt = jwtJsDecode.jwtDecode(token)
  return {
    username: jwt.payload.username,
    email: jwt.payload.email,
    avatar: jwt.payload.avatar,
    expire: jwt.payload.exp
  }
}

// State object
export const state = () => ({
  isAuth: false,
  user: { username: null, email: null, avatar: null, token: null, expire: null }
})

// Getter functions
export const getters = {
  isAuth (state) {
    return !(!state.isAuth || nowInSeconds > state.user.expire)
  },
  getUser: state => state.user
}

// Mutations
export const mutations = {
  RESET (state) {
    state.isAuth = false
    state.user = { username: null, email: null, avatar: null, token: null, expire: null }
  },
  SET_USER (state, token) {
    try {
      const user = decodeJWT(token)
      if (user && nowInSeconds < user.expire) {
        state.user.username = user.username
        state.user.email = user.email
        state.user.avatar = user.avatar
        state.user.token = token
        state.user.expire = user.expire
        state.isAuth = true
        return
      }
      state.isAuth = false
      state.user = { username: null, email: null, avatar: null, token: null, expire: null }
    } catch (e) {
      state.isAuth = false
      state.user = { username: null, email: null, avatar: null, token: null, expire: null }
    }
  }
}

// Actions
export const actions = {
  reset (state) {
    state.commit('RESET')
  },
  auth (state, token) {
    try {
      this.$cookie.removeAll()
      this.$cookie.set('auth', token, { maxAge: 60 * 60 * 60 * 24 * 30 })
      state.commit('SET_USER', token)
    } catch (e) {
      throw new Error(e.message)
    }
  },
  fetchVariable1 ({ commit }) {
    return new Promise((resolve, reject) => {
      // Make network request and fetch data
      // and commit the data
      // ex: commit('SET_VARIABLE_1', data);
      resolve()
    })
  }
}
