import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _6d274a55 = () => interopDefault(import('../pages/edit/index.vue' /* webpackChunkName: "pages/edit/index" */))
const _7cfa19d4 = () => interopDefault(import('../pages/profile/index.vue' /* webpackChunkName: "pages/profile/index" */))
const _401620ec = () => interopDefault(import('../pages/auth/login.vue' /* webpackChunkName: "pages/auth/login" */))
const _527ef5dc = () => interopDefault(import('../pages/auth/register.vue' /* webpackChunkName: "pages/auth/register" */))
const _126d7ef8 = () => interopDefault(import('../pages/profile/edit.vue' /* webpackChunkName: "pages/profile/edit" */))
const _0fbb4a8c = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))
const _4a8a6dbd = () => interopDefault(import('../pages/index/index.vue' /* webpackChunkName: "pages/index/index" */))
const _2a822006 = () => interopDefault(import('../pages/index/bookmarked/index.vue' /* webpackChunkName: "pages/index/bookmarked/index" */))
const _b8ab8d10 = () => interopDefault(import('../pages/index/bookmarked/_slug/index.vue' /* webpackChunkName: "pages/index/bookmarked/_slug/index" */))
const _48d3cc75 = () => interopDefault(import('../pages/index/_slug.vue' /* webpackChunkName: "pages/index/_slug" */))

// TODO: remove in Nuxt 3
const emptyFn = () => {}
const originalPush = Router.prototype.push
Router.prototype.push = function push (location, onComplete = emptyFn, onAbort) {
  return originalPush.call(this, location, onComplete, onAbort)
}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/edit",
    component: _6d274a55,
    name: "edit"
  }, {
    path: "/profile",
    component: _7cfa19d4,
    name: "profile"
  }, {
    path: "/auth/login",
    component: _401620ec,
    name: "auth-login"
  }, {
    path: "/auth/register",
    component: _527ef5dc,
    name: "auth-register"
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
      path: "bookmarked",
      component: _2a822006,
      name: "index-bookmarked"
    }, {
      path: "bookmarked/:slug?",
      component: _b8ab8d10,
      name: "index-bookmarked-slug"
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
