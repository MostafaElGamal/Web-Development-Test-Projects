/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'
import {store} from './Store/store'
import router from './Router/router.js'



Vue.use(Vuetify)



window.EventBus = new Vue();


Vue.component('home-app', require('./components/home.vue').default);

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!store.getters.loggedin) {
      next({
        path: '/',
      })
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (store.getters.loggedin) {
      next({
        path: '/issues',
      })
    } else {
      next()
    }
  } {
    next() // make sure to always call next()!
  }
})

 
const app = new Vue({
    el: '#app',
    store:store,
    router
});
