import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _0effaaea = () => interopDefault(import('../pages/login.vue' /* webpackChunkName: "pages/login" */))
const _1a7cec8e = () => interopDefault(import('../pages/profile/index.vue' /* webpackChunkName: "pages/profile/index" */))
const _0927de71 = () => interopDefault(import('../pages/register.vue' /* webpackChunkName: "pages/register" */))
const _30486cfe = () => interopDefault(import('../pages/profile/edit.vue' /* webpackChunkName: "pages/profile/edit" */))
const _2ed88774 = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/login",
    component: _0effaaea,
    name: "login"
  }, {
    path: "/profile",
    component: _1a7cec8e,
    name: "profile"
  }, {
    path: "/register",
    component: _0927de71,
    name: "register"
  }, {
    path: "/profile/edit",
    component: _30486cfe,
    name: "profile-edit"
  }, {
    path: "/",
    component: _2ed88774,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
