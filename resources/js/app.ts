import "./bootstrap";

import { createApp } from "vue";
import router from './router';
import PrimeVue from 'primevue/config';

//import Welcome from "./components/Welcome.vue";

const app = createApp({
    el: '#app',
    router
});

app.use(PrimeVue, );

console.log(app);

app.mount('#app');
