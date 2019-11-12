import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _7c6c045e = () => interopDefault(import('../pages/login.vue' /* webpackChunkName: "pages/login" */))
const _7cfa19d4 = () => interopDefault(import('../pages/profile/index.vue' /* webpackChunkName: "pages/profile/index" */))
const _2f48fd6b = () => interopDefault(import('../pages/register.vue' /* webpackChunkName: "pages/register" */))
const _126d7ef8 = () => interopDefault(import('../pages/profile/edit.vue' /* webpackChunkName: "pages/profile/edit" */))
const _0fbb4a8c = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))
const _4a8a6dbd = () => interopDefault(import('../pages/index/index.vue' /* webpackChunkName: "pages/index/index" */))
const _48d3cc75 = () => interopDefault(import('../pages/index/_slug.vue' /* webpackChunkName: "pages/index/_slug" */))

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
    path: "/profile",
    component: _7cfa19d4,
    name: "profile"
  }, {
    path: "/register",
    component: _2f48fd6b,
    name: "register"
  }, {
    path: "/profile/edit",
    component: _126d7ef8,
    name: "profile-edit"
  }, {
    path: "/",
    component: _0fbb4a8c,
    children: [{
      path: "",
      component: _4a8a6dbd,
      name: "index"
    }, {
      path: ":slug",
      component: _48d3cc75,
      name: "index-slug"
    }]
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
