import { createWebHistory, createRouter, RouteRecordRaw } from 'vue-router';
// Import here all the pages for the routes

const routes: RouteRecordRaw[] = [
    /*
      {
        path: '/',
        name: 'login',
        component: LoginComponent
      },
      {
        path: '/main',
        name: 'main',
        component: MainComponent,
        children: [
          {
            path: '/',
            name: 'dashboard',
            component: DashBoardComponent
          }
        ]
      },
      {
        path: '/example',
        name: 'example',
        component: ExampleComponent
      },
      {
        path: '/test',
        name: 'test',
        component: TestPageComponent,
      },
      */
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
