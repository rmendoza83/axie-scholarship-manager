import { createWebHistory, createRouter, RouteRecordRaw } from 'vue-router';

import DemoComponent from './components/Demo.vue';

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    name: 'demo',
    component: DemoComponent
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
