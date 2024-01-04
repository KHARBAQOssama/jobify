import { createRouter, createWebHistory } from "vue-router";
import Auth from '../views/Auth.vue';
import LoginForm from '../components/Auth/LoginForm.vue'
import RegisterForm from '../components/Auth/RegisterForm.vue'
import ChooseRoleForm from '../components/Auth/ChooseRoleForm.vue'
import CompleteProfileForm from '../components/Auth/CompleteProfileForm.vue'
const routes = [
  {
    path: "/auth",
    component: Auth,
    children: [
      {
        path: "login",
        component: LoginForm,
      },
      {
        path: "register",
        component: RegisterForm,
      },
      {
        path: "choose-role",
        component: ChooseRoleForm,
      },
      {
        path: "complete-profile",
        component: CompleteProfileForm,
      },
    ],
  },
];
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
