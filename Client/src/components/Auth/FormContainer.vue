<template>
    <div class="flex flex-col justify-center items-center md:items-start px-6 py-12 gap-2 flex-1">
      <img class="flex md:hidden" src="../../../public/images/jobify-blue-logo.png" alt="">
      <h1 class="w-full text-start text-3xl">{{ type.toUpperCase() }}</h1>
      <div class="massage text-red-600 bg-red-200 p-3 py-4 opacity-0 w-full rounded-lg border-r-4 border-red-600">Email is not correct</div>
      <LoginForm v-if="type == 'login'"/>
      <RegisterForm v-if="type == 'register'"/>
      <ChooseRoleForm v-if="type == 'choose role'"/>
    </div>
</template>

<script>
import ChooseRoleForm from './ChooseRoleForm.vue';
import LoginForm from './LoginForm.vue';
import RegisterForm from './RegisterForm.vue';
export default {
    props: ['type'],
    components:{
        LoginForm,
        RegisterForm,
        ChooseRoleForm
    }
}
</script>

<style scoped>
h1,img{
    min-width: 320px;
    max-width: 420px;
}
</style>