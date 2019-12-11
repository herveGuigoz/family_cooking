// State object
export const state = () => ({
  show: false,
  message: null,
  options: null
})

// Mutations
export const mutations = {
  setUp(state, { message, options }) {
    state.message = message
    state.options = options
    state.show = true
  },
  reset(state) {
    state.show = false,
    state.message = null,
    state.options = null
  }
}
