import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
require('./bootstrap'); //bootstrap.js
//require('axios');

//Main pages
import App from './components/App.vue';

Vue.use(VueRouter);


/*const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    components: { App }
});*/

/**
 * Neue Vue Instanz zum Rendern des App-Components
 * hin zum div mit der id #app im welcome.blade-File
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

