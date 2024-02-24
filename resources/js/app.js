import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';
import routerPath from './routes/routes';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueHtmlToPaper from 'vue-html-to-paper';
const router = createRouter({
    history: createWebHistory(),
    routes: routerPath,
    scrollBehavior() {
        document.getElementById('app').scrollIntoView();
    }
});
const options = {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes',
        'rtl=yes'
    ],
    styles: [
        '/frontend/css/plugins.css',
        '/frontend/css/style.css'
    ]
}


const app = createApp(App);
app.use(router);
app.use(VueSweetalert2);
app.use(VueHtmlToPaper, options);
app.mount('#app');

