// State object
export const state = () => ({
  selected: null,
  list: null
})

// Getter functions
export const getters = {
  getList (state) {
    return state.list
  },
  getRecipeBySlug: (state, getters) => (slug) => {
    if (state.list){
      return state.list.find(recipe => recipe.slug === slug)
    }
  }
}

// Mutations
export const mutations = {
  SET_RECIPES_LIST (state, data) {
    state.list = data
  },
  SET_SELECTED (state, slug) {
    state.selected = slug
  },
  REMOVE_SELECTED (state) {
    state.selected = null
  },
  UPDATE_BOOKMARKS (state, recipe, isBookmarked ) {
    const index = state.list.findIndex((item) => {
      return item.slug === recipe.slug
    })
    state.list[index].isBookmarked = isBookmarked
  }
}

// Actions

export const actions = {
//  async nuxtServerInit({ dispatch }) {
//    await dispatch('getRecipes')
//  },
  async getRecipes(vuexContext) {
    const token = this.$cookie.get('auth')
    if (token) { this.$axios.setToken(token, 'Bearer') }
    const response = await this.$axios.$get('/recipes')
    vuexContext.commit('SET_RECIPES_LIST', response['hydra:member'])
  },
  async handleBookmarkAction(vuexContext, slug) {
    console.log(vuexContext.state.auth.user.id)
    // await response = this.$axios.$put('/people/' + vuexContext.state.auth.user.id, data)
    // vuexContext.dispatch('UPDATE_BOOKMARKS', response.isBookmarked)
  }
}
