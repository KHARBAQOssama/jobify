<template>
  <div
    class="w-[50%] min-w-[300px] max-w-[500px] mx-auto bg-white flex flex-col items-center py-5 rounded-md"
  >
    <h1 class="max-w-[400px] text-start w-[90%] text-xl font-bold">Choose Your Role</h1>
    <form @submit.prevent="handleSubmit" class="w-[90%] py-4 gap-4 flex flex-col">
      <div class="flex flex-col gap-4 pb-5">
        <label
          @click="setMessage({})"
          for="employee"
          :class="role == '2' ? 'px-5 py-3 border-spacing-3 border-blue-500  w-full max-w-[400px] m-auto border cursor-pointer rounded-2xl group flex justify-start items-center gap-5' : 'px-5 py-3 border cursor-pointer rounded-2xl  group flex  justify-start items-center gap-5 transition-all w-full max-w-[400px] m-auto '"
        >
          <svg
            :class="role == '2' ? 'fill-blue-400':'fill-gray-300 group-hover:fill-blue-400 transition-all'"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            version="1.1"
            id="Capa_1"
            x="0px"
            y="0px"
            viewBox="0 0 512 512"
            style="enable-background:new 0 0 512 512;"
            xml:space="preserve"
            width="24"
            height="24"
          >
            <g>
              <circle cx="256" cy="128" r="128" />
              <path
                d="M256,298.667c-105.99,0.118-191.882,86.01-192,192C64,502.449,73.551,512,85.333,512h341.333   c11.782,0,21.333-9.551,21.333-21.333C447.882,384.677,361.99,298.784,256,298.667z"
              />
            </g>
          </svg>
          <span
            :class="role == '2' ? 'text-xl text-blue-400' : 'text-xl text-gray-300 group-hover:text-blue-400 transition-all'"
          >Employee</span>
        </label>
        <label
          @click="setMessage({})"
          for="company"
          :class="role == '3' ? 'px-5 py-3 border-spacing-3 border-blue-500  w-full max-w-[400px] m-auto border cursor-pointer rounded-2xl group flex justify-start items-center gap-5' : 'px-5 py-3 border cursor-pointer rounded-2xl  group flex  justify-start items-center gap-5 transition-all w-full max-w-[400px] m-auto'"
        >
          <svg
            :class="role == '3' ? 'fill-blue-400':'fill-gray-300 group-hover:fill-blue-400 transition-all'"
            xmlns="http://www.w3.org/2000/svg"
            id="Layer_1"
            height="24"
            viewBox="0 0 24 24"
            width="24"
            data-name="Layer 1"
          >
            <path
              d="m9 0h-4a5 5 0 0 0 -5 5v14a5 5 0 0 0 5 5h9v-19a5 5 0 0 0 -5-5zm-4 19h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm5 12h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm9-2h-3v19h3a5.006 5.006 0 0 0 5-5v-9a5.006 5.006 0 0 0 -5-5zm1 14a1 1 0 1 1 1-1 1 1 0 0 1 -1 1zm0-4a1 1 0 1 1 1-1 1 1 0 0 1 -1 1zm0-4a1 1 0 1 1 1-1 1 1 0 0 1 -1 1z"
            />
          </svg>
          <span
            :class="role == '3' ? 'text-xl text-blue-400' : 'text-xl text-gray-300 group-hover:text-blue-400 transition-all'"
          >Company</span>
        </label>
        <input
          class="hidden"
          name="role"
          id="employee"
          value="2"
          v-model="role"
          type="radio"
        />
        <input
          class="hidden"
          name="role"
          id="company"
          value="3"
          v-model="role"
          type="radio"
        />
      </div>

      <button
        class="text-white p-3 rounded-lg bg-blue-300 w-full max-w-[400px] m-auto hover:bg-blue-500"
      >Next</button>
    </form>
  </div>
</template>

<script>
import { mapMutations, mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      role : "",
    };
  },
  computed: {
    ...mapGetters("userStore", { user: "getUser" })
  },
  created() {
    console.log(this.user);
  },
  methods: {
    ...mapMutations("userStore", ["setUser", "setMessage"]),
    ...mapActions("userStore", ["initializeRole"]),
    async handleSubmit() {
      // this.setUser(this.user);
      let response = await this.initializeRole(this.role);
      if (response.status === 200) this.$router.push("/auth/complete-profile");
    }
  }
};
</script>

<style scoped>
/* form {
  min-width: 320px;
  max-width: 420px;
} */
</style>