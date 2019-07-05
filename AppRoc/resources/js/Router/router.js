import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

   import Signup from '../components/Auth/Signup'
   import Logout from '../components/Auth/Logout'
   import issues from '../components/listComponent'



const routes = [
  	 { path: '/signup', component: Signup , meta:{ requiresVisitor: true} },
  	 { path: '/logout', component: Logout , meta:{ requiresAuth: true} },
   	 { path: '/issues', component: issues , meta:{ requiresAuth: true} },
  
  
]



const router = new VueRouter({
  routes,
  hashbang : false,
  mode : 'history'

})

export default router 