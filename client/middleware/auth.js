export default function({ app, store }) {

  if (store.getters.isLogged) {

    return null
  }

  const tokenCreationDate = app.$cookie.get('creationDate');
  const username = app.$cookie.get('username');
  const token = app.$cookie.get('token');

  if (
    username
    && token
    && tokenCreationDate
    && app.$moment() < app.$moment(tokenCreationDate).add(30, 'days')
  ) {
    store.commit("SET_USERNAME", username)
    store.commit("SET_IS_AUTH", true)

    return null
  }

  store.commit('RESET');
}
