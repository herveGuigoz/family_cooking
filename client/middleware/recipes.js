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
      .get('http://0.0.0.0:8000/recipes.json')
      .then((response) => {
        store.commit('recipes/SET_RECIPES', response)
      })
      .catch(e => console.log(e))
  }
}
