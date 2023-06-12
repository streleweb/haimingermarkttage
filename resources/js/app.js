import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import Vuex from 'vuex'
import Meta from 'vue-meta'

require('./bootstrap'); //bootstrap.js
//require('axios');

//Main page
import App from './components/BenutzerAnsichtComponents/App.vue';

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(Meta)

/**
 * Neue Vue Instanz zum Mounten des App-Components
 * hin zum div mit der id #app im welcome.blade.php-File
 *
 * Instanziieren des VueRouters mit dem Konfiguartions-File
 * routes.js
 */
new Vue({
  render(h) {
    return h(App)
  },
  el: '#app',
  router: new VueRouter(routes),
  components: { App }
});

