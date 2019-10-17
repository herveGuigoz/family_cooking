import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _7c6c045e = () => interopDefault(import('../pages/login.vue' /* webpackChunkName: "pages/login" */))
const _2f48fd6b = () => interopDefault(import('../pages/register.vue' /* webpackChunkName: "pages/register" */))
const _0fbb4a8c = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/login",
    component: _7c6c045e,
    name: "login"
  }, {
    path: "/register",
    component: _2f48fd6b,
    name: "register"
  }, {
    path: "/",
    component: _0fbb4a8c,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
