export default function ({ store, $axios }) {
  if (!store.state.recipes.list) {
    console.log('recipes middelware')
    if (store.getters.isAuth) {
      $axios.setToken(store.getters.getUser.token, 'Bearer')
    }
    $axios
      .get('http://0.0.0.0:8000/recipes.json')
      .then((response) => {
        store.commit('recipes/SET_RECIPES', response)
      })
      .catch(e => console.log(e))
  }
}
