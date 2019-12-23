const jwtJsDecode = require('jwt-js-decode')
const nowInSeconds = Date.now() / 1000
const decodeJWT = function (token) {
  const jwt = jwtJsDecode.jwtDecode(token)
  return {
    username: jwt.payload.username,
    email: jwt.payload.email,
    avatar: jwt.payload.avatar,
    expire: jwt.payload.exp,
    id: jwt.payload.id
  }
}

// State object
export const state = () => ({
  token: null,
  expire: null,
  user: { id: null, username: null, email: null, avatar: null }
})

// Getter functions
export const getters = {
  isAuthenticated (state) {
    return (state.token != null && nowInSeconds < state.expire)
  },
  getUser: state => state.user,
  getToken: state => state.token
}

// Mutations
export const mutations = {
  setAuth(state, token) {
    const JWT = decodeJWT(token)
    if (nowInSeconds < JWT.expire) {
      state.expire = JWT.expire
      state.user.id = JWT.id
      state.user.username = JWT.username
      state.user.email = JWT.email
      state.user.avatar = JWT.avatar
      state.token = token
    }
  },
  reset(state) {
    state.token = null,
    state.expire = null,
    state.user = { id: null, username: null, email: null, avatar: null }
  }
}

// Actions
export const actions = {
  async authenticateUser(vuexContext, authData) {
    const response = await this.$axios.$post('authentication_token', { username: authData.username, password: authData.password })
    vuexContext.commit('setAuth', response.token)
    if (this.$cookie.get('auth')) {
      this.$cookie.remove('auth')
    }
    this.$cookie.set('auth', response.token, { maxAge: 2592000 }) // 60 * 60 * 24 * 30 = 2592000
    vuexContext.dispatch('getRecipes', null, { root: true }) // https://vuex.vuejs.org/guide/modules.html#accessing-global-assets-in-namespaced-modules
  },
  async registerUser(vuexContext, registerData) {
    await this.$axios.$post('/people', {
      username: registerData.username,
      email: registerData.email,
      password: registerData.password
    })
    vuexContext.dispatch('authenticateUser', { username: registerData.username, password: registerData.password })
  },
  async updateUser(vuexContext, updateData) {
    const data = { email: updateData.email, avatar: updateData.avatar}
    if (updateData.newPassword) { data.password = updateData.newPassword}
    await this.$axios.$put('/people/' + vuexContext.state.user.id, data)
    vuexContext.dispatch('authenticateUser', { username: updateData.username, password: updateData.password })
  },
  initAuth(vuexContext) {
    const tokenInCookie = this.$cookie.get('auth')
    if (tokenInCookie) {
      vuexContext.commit('setAuth', tokenInCookie)
    }
  },
  logOut(vuexContext) {
    this.$cookie.remove('auth')
    vuexContext.commit('reset')
    vuexContext.dispatch('getRecipes', null, { root: true })
  }
}
