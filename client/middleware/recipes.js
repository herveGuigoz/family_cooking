export default async function ({ store, $axios }) {
  if (!store.state.recipes.list) {
    /*
    if (process.server) {
      console.log('recipes middelware from server')
    }
    if (!process.server) {
      console.log('recipes middelware from client')
    }
    */
    await $axios
      .get('/recipes.json')
      .then((response) => {
        store.commit('recipes/SET_RECIPES_LIST', response)
      })
      .catch(e => console.log(e))
  }
}
