

window.Vue = require('vue');
// axios = require('axios');

import App from './components/App.vue';
import Vue from 'vue';



const root = new Vue({
    el: '#root',
    render: h => h(App)
});
