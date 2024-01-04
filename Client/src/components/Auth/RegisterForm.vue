<template>
  <div
    class="w-[50%] min-w-[300px] max-w-[500px] mx-auto bg-white flex flex-col items-center py-5 rounded-md"
  >
    <h1 class="max-w-[400px] text-start w-[90%] text-xl font-bold">Register</h1>
    <form action @submit.prevent="handleSubmit" class="w-[90%] py-4 gap-4 flex flex-col">
      <input
        @focus="setMessage({})"
        class="b bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="credentials.email"
        placeholder="Email"
        type="email"
      />
      <input
        @focus="setMessage({})"
        class="b bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="credentials.password"
        placeholder="Password"
        type="password"
      />
      <input
        @focus="setMessage({})"
        class="b bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="credentials.password_confirmation"
        placeholder="Repeat Password"
        type="password"
      />
      <button
        class="text-white p-3 rounded-lg bg-blue-300 w-full max-w-[400px] m-auto hover:bg-blue-500"
      >Register</button>
      <p class="font-light text-sm w-full max-w-[400px] m-auto">
        Do You Have An Account?
        <RouterLink to="login" class="font-bold">Login</RouterLink>
      </p>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
  data() {
    return {
      credentials: {
        email: "",
        password: "",
        password_confirmation: ""
      }
    };
  },
  computed: {
    ...mapGetters("userStore", { user: "getUser" })
  },
  methods: {
    ...mapMutations("userStore", ["setUser", "setMessage"]),
    ...mapActions("userStore", ["register"]),
    async handleSubmit() {
      // this.setUser(this.user);
      let response = await this.register(this.credentials);
      if (response.status === 200) this.$router.push("/auth/choose-role");
    }
  }
};
</script>

<style scoped>
</style>