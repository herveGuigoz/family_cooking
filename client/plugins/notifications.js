export default ({ app }, inject) => {
  inject('notifications', (message, options = {}) => app.store.commit('notification/setUp', { message, options }))
}
// Arguments :
// message -> String
// options -> Object { delay (int) (milliseconds), style (string) (error, success, lock) }
