export default function ({ app, store }) {
  console.log('auth middleware')
  const cookie = app.$cookie.get('auth')

  if (!store.getters.isAuth && cookie) {
    store.commit('SET_USER', cookie)
  }
}
