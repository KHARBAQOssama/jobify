<template>
  <div class="flex flex-col justify-center items-center px-6 py-12 gap-2 flex-1 bg-gray-50">
    <img class="flex" src="/images/jobify-blue-logo.png" alt />
    <h1 class="w-full max-w-[400px] ps-4 text-start text-xl">{{ type.toUpperCase() }}</h1>

    <LoginForm v-if="type == 'login'" />
    <RegisterForm v-else-if="type == 'register'" />
    <ChooseRoleForm v-else-if="type == 'choose role'" />
    <CompleteProfileForm v-else-if="type == 'complete profile'" />
  </div>
</template>

<script>
import ChooseRoleForm from "./ChooseRoleForm.vue";
import CompleteProfileForm from "./CompleteProfileForm.vue";
import LoginForm from "./LoginForm.vue";
import RegisterForm from "./RegisterForm.vue";
import { mapGetters } from "vuex";
export default {
  data() {
    return {};
  },
  components: {
    LoginForm,
    RegisterForm,
    ChooseRoleForm,
    CompleteProfileForm
  },
  computed: {
    ...mapGetters("userStore", { message: `getMessage` }),
    type() {
      return this.$route.path.replace(/^\/+/g, "").replace(/-/g, " ");
    }
  }
};
</script>

<style scoped>
h1,
img,
.message {
  min-width: 320px;
  max-width: 420px;
}
.message.success {
  background-color: rgba(0, 128, 0, 0.164);
  color: rgb(49, 174, 49);
  border-color: rgb(49, 174, 49);
}
.message.danger {
  background-color: rgba(128, 0, 0, 0.164);
  color: rgb(174, 49, 49);
  border-color: rgb(174, 49, 49);
}
.message.success {
  background-color: rgba(0, 128, 0, 0.164);
  color: rgb(49, 174, 49);
  border-color: rgb(49, 174, 49);
}
.message.success {
  background-color: rgba(0, 128, 0, 0.164);
  color: rgb(49, 174, 49);
  border-color: rgb(49, 174, 49);
}
</style>