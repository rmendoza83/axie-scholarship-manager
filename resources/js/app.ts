import "./bootstrap";

import { createApp } from "vue";
import router from './router';
import filter from './filter';
import PrimeVue from 'primevue/config';

//import Welcome from "./components/Welcome.vue";

const app = createApp({
    el: '#app',
    router
});

// Custom Filters (Like Pipes in AngularJS)
// app.config.globalProperties.$filters = filter;

app.use(PrimeVue, );

console.log(app);

app.mount('#app');
