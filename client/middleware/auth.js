export default function({ app, store }) {

  const cookie = app.$cookie.get('auth')

  if (!store.getters.isAuth && cookie) {
     store.commit('SET_USER', cookie)
  }
}
