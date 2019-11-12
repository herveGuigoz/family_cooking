// State object
export const state = () => ({
  list: null
})

// Getter functions
export const getters = {
  getList (state) {
    return state.list
  }
}

// Mutations
export const mutations = {
  SET_RECIPES_LIST (state, { data }) {
    state.list = data
  }
}
