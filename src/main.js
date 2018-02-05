// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

var filter = function(text, length, clamp){
  clamp = clamp || '...'
  var node = document.createElement('div')
  node.innerHTML = text
  var content = node.textContent
  return content.length > length ? content.slice(0, length) + clamp : content
}

Vue.config.productionTip = false
Vue.filter('truncate', filter)

/* eslint-disable no-new */
new Vue({
  http: {
    root: 'http://localhost:8000/api/'
  },
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})

