export default ({ app }, inject) => {
  inject('notifications', (message, options = {}) => app.store.commit('notification/setUp', { message, options }))
}
// Arguments :
// message -> String
// options -> Object { (int)delay: milliseconds, (string)style: 'error' or 'success' or 'lock', (array)links: [{title: 'buttonTitle', to: 'path'}] }
