import { createRouter, createWebHistory } from 'vue-router'
import { routes } from 'vue-router/auto-routes'

export const router = createRouter({
  history: createWebHistory(),
  linkActiveClass: 'active',
  routes
})

/**
 * Globális Navigációs Őrszem
 */
router.beforeEach((to, from, next) => {
  // Megnézzük, van-e elmentett token
  const token = localStorage.getItem('auth_token');

  // Meghatározzuk, melyik oldalakra tilos belépni token nélkül
  // Az auto-routes miatt a 'dashboard' elérési útja általában '/dashboard'
  const protectedRoutes = ['/dashboard']; 

  // Ha védett oldalra tart, de nincs tokenje -> irány a login
  if (protectedRoutes.includes(to.path) && !token) {
    next('/login');
  } 
  // Ha már be van jelentkezve (van token), ne engedjük vissza a loginra
  else if (to.path === '/login' && token) {
    next('/dashboard');
  }
  // Minden más esetben engedjük tovább
  else {
    next();
  }
});