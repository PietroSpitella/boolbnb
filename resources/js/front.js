window.Vue = require('vue');
window.axios = require('axios');
import App from '../js/views/App';
import router
 from './router';
const app = new Vue({
el: '#vue',
render: h=>h(App)
});