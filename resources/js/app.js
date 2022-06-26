
require('./bootstrap');
import App from './components/App';

window.Vue = require('vue').default;

const app = new Vue({
    el: '#app',
    components: {
        App
    },
});
