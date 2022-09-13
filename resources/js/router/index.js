import Vue from 'vue'
import Router from 'vue-router'
import Home from '../views/home'
import Downloads from '../views/downloads'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  routes: [
    {
    path: '/',
    component: () => import('../layouts/default.vue'),
    children: [
        {
          path: '/',
          name: 'Home',
          component: Home,
        },
        {
          path: '/downloads',
          name: 'Downloads',
          component: Downloads,
        },
      ]
    }
  ]
})

export default router
