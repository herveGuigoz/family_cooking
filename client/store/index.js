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
  getPreviousRecipeInList: (state) => (slug) => {
    const index = state.list.findIndex((item) => {
      return item.slug === slug
    })
    if (index === 0 ) {
      return null
    }
    return state.list[index - 1].slug
  },
  getNextRecipeInList: (state) => (slug) => {
    const index = state.list.findIndex((item) => {
      return item.slug === slug
    })
    if (index === state.list.length -1 ) {
      return null
    }
    return state.list[index + 1].slug
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
  UPDATE_BOOKMARKS (state, payload) {
    const index = state.list.findIndex((item) => {
      return item.slug === payload.slug
    })
    state.list[index].isBookmarked = payload.isBookmarked
  },
  UPDATE_LOVE_COUNTER (state, slug, count) {
    const index = state.list.findIndex((item) => {
      return item.slug === slug
    })
    state.list[index].totalInteractionsCount = state.list[index].totalInteractionsCount - state.list[index].userInteractionCount + count
    state.list[index].userInteractionCount = count
  }
}

// Actions
export const actions = {
  async nuxtServerInit({ dispatch }) {
    await dispatch('getRecipes')
    await dispatch('auth/initAuth')
  },
  async getRecipes(vuexContext) {
    const token = this.$cookie.get('auth')
    if (token) { this.$axios.setToken(token, 'Bearer') }
    const response = await this.$axios.$get('/recipes')
    vuexContext.commit('SET_RECIPES_LIST', response['hydra:member'])
  },
  async handleBookmarkAction(vuexContext, slug) {
    const response = await this.$axios.$post('/bookmark', { slug })
    vuexContext.commit('UPDATE_BOOKMARKS', { slug, isBookmarked: response.isBookmarked })
  },
  async handleSendLoveAction(vuexContext, slug, count) {
    const response = await this.$axios.$post('/bookmark', { slug: slug, count: count })
    vuexContext.dispatch('UPDATE_LOVE_COUNTER', slug, response.loves)
  }
}
