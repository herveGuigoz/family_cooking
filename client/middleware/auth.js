export default function ({ store }) {
  if (!process.server && !store.state.auth.token) {
    store.dispatch('auth/initAuth')
  }
}
