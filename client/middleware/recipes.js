export default async function ({ store, $axios }) {
  if (!store.state.recipes.list) {
    await $axios
      .get('/recipes.json')
      .then((response) => {
        store.commit('recipes/SET_RECIPES_LIST', response)
      })
      .catch(e => console.log(e))
  }
}
