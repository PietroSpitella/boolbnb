window.Vue = require('vue');
window.axios = require('axios');
import App from '../js/views/App';
const app = new Vue({
el: '#vue',
render: h=>h(App)
});