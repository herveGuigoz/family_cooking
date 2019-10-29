export default function ({ context, store, redirect }) {
  if (!store.getters.isAuth) {
    return redirect('/login')
  }

  return null
}
