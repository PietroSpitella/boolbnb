window.Vue = require('vue');
window.axios = require('axios');
import App from '../js/components/App';

const app = new Vue({
el: '#vue',
render: h=>h(App)
});