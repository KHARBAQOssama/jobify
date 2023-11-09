import { createRouter, createWebHistory } from "vue-router";
import Auth from '../views/Auth.vue';
import Dashboard from '../views/Dashboard.vue';
const routes = [
  {
    path: "/",
    component: Dashboard,
    name: "dashboard",
  },
  {
    path: "/login",
    component: Auth,
    name: "login-page",
  },
  {
    path: "/register",
    component: Auth,
    name: "register-page",
  },
  {
    path: "/choose-role",
    component: Auth,
    name: "choose-role-page",
  },
  {
    path: "/complete-profile",
    component: Auth,
    name: "complete-profile-page",
  },
  
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
