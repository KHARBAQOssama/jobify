<template>
    <form action="" @submit.prevent="handleSubmit" class="w-full py-4 gap-4 flex flex-col">
          <input @focus="setMessage({})" class="b bg-gray-100 p-3 w-full font-medium rounded-lg" v-model="user.email"  placeholder="Email" type="email">
          <input @focus="setMessage({})" class="b bg-gray-100 p-3 w-full font-medium rounded-lg" v-model="user.password"  placeholder="Password" type="password">
          <input @focus="setMessage({})" class="b bg-gray-100 p-3 w-full font-medium rounded-lg" v-model="user.password_confirmation"  placeholder="Repeat Password" type="password">
          <button class="text-white p-3 rounded-lg bg-blue-400">Register</button>
          <p class="font-light text-sm">Do You Have An Account? <span>Login</span></p>
    </form>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
    data(){
        return {
        }
    },
    computed: {
        ...mapGetters("userStore",{user : 'getUser'}),
    },
    methods: {
        ...mapMutations("userStore", ["setUser","setMessage"]),
        ...mapActions("userStore", ["register"]),
        async handleSubmit(){
            this.setUser(this.user)
            let response = await this.register()
            if(response.status === 200) this.$router.push('/choose-role')
        }
    },
}
</script>

<style scoped>
form{
    min-width: 320px;
    max-width: 420px;
}
</style>