import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CatalogosView from '../views/CatalogosView.vue'
import VentasView from '../views/VentasView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/catalogos',
      name: 'catalogos',
      component: CatalogosView
    },
    {
      path: '/ventas',
      name: 'ventas',
      component: VentasView
    }
  ]
})

export default router
