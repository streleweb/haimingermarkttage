import Vue from 'vue';
require('./bootstrap'); //bootstrap.js

//Main pages
import App from './components/app.vue';



const app = new Vue({
    el: '#app',
    components: { App }
});
