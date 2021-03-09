import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
require('./bootstrap'); //bootstrap.js

//Main pages
import App from './components/App.vue';

Vue.use(VueRouter);


const app = new Vue({
    el: '#App',
    router: new VueRouter(routes),
    components: { App }
});
