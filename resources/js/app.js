import Vue from 'vue'
import App from './App'
import Buefy from 'buefy'
import axios from './axios.js'
import router from './router'

Vue.use(Buefy);
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})