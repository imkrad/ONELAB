import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import '../scss/config/default/app.scss';
import '@vueform/slider/themes/default.css';
import '../scss/mermaid.min.css';
import "@vueform/multiselect/themes/default.css";
import 'leaflet/dist/leaflet.css';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

<<<<<<< HEAD
// import './echo';
=======
import './echo';
>>>>>>> f175fc268731be76882ecde9c1be8f7e951af682
