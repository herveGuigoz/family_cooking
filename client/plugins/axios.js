export default function ({ $axios, redirect, store }) {
  $axios.onRequest((config) => {
    console.log(config.headers.referer)
    if (store.getters.isAuth) {
      config.headers.common.Authorization = `Bearer ${store.getters.getUser.token}`
    }
  })
}
