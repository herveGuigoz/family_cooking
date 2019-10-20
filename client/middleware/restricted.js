export default function({ context, store, redirect }) {

  if (!store.getters.isLogged) {
console.log('redirect')
    return redirect('/login')
  }
}
