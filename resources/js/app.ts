import "./bootstrap";

import { createApp } from "vue";
import router from './router';
import filter from './filter';

// PrimeVue Imports
import PrimeVue from 'primevue/config';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

const app = createApp({});

// Custom Filters (Like Pipes in AngularJS)
app.config.globalProperties.$filters = filter;

app.use(PrimeVue);
app.component('DataTable', DataTable);
app.component('Column', Column);

app.use(router).mount('#app');
