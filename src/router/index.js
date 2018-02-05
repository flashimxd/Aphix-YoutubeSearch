import Vue from 'vue'
import Router from 'vue-router'
import Resource from 'vue-resource'
import Index from '@/components/Index'
// require('vue-resource')

Vue.use(Router)
Vue.use(Resource)
Vue.http.options.root = 'http://localhost:8000/api/'

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    }
  ]
})
