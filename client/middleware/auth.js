export default function({ app, store }) {

  if (store.getters.isAuth) {
    const user = store.getters.getUser
    if (app.$moment() > app.$moment(user.lastLogin).add(30, 'days')) {
      store.commit('RESET')
      return
    }
    return
  }

  const cookie = app.$cookie.get('auth')

  if (cookie && app.$moment() < app.$moment(cookie.lastLogin).add(30, 'days')) {
    store.commit('SET_USER', cookie)
  }
}
