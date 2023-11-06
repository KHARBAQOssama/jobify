<template>
  <form action class="w-full py-4 gap-4 flex flex-col">
    <div class="flex gap-4 pb-5">
      <label
        for="employee"
        :class="role == '2' ? 'p-6 w-52  border-4 cursor-pointer rounded-2xl fill-blue-500 border-blue-500 text-blue-500 group flex flex-col justify-center items-center gap-2' : 'p-6 w-52 border-spacing-5 border-4 cursor-pointer rounded-2xl hover:fill-blue-500 hover:border-blue-500 hover:text-blue-500 group flex flex-col justify-center items-center gap-2 transition-all'"
      >
        <svg
        :class="role == '2' ? 'fill-blue-500':'fill-gray-300 group-hover:fill-blue-500 transition-all'"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          version="1.1"
          id="Capa_1"
          x="0px"
          y="0px"
          viewBox="0 0 512 512"
          style="enable-background:new 0 0 512 512;"
          xml:space="preserve"
          width="100"
          height="100"
        >
          <g>
            <circle cx="256" cy="128" r="128" />
            <path
              d="M256,298.667c-105.99,0.118-191.882,86.01-192,192C64,502.449,73.551,512,85.333,512h341.333   c11.782,0,21.333-9.551,21.333-21.333C447.882,384.677,361.99,298.784,256,298.667z"
            />
          </g>
        </svg>
        <span :class="role == '2' ? 'text-2xl text-blue-500' : 'text-2xl text-gray-300 group-hover:text-blue-500 transition-all'">Employee</span>
      </label>
      <label
        for="company"
        :class="role == '3' ? 'p-6 w-52  border-4 cursor-pointer rounded-2xl fill-blue-500 border-blue-500 text-blue-500 group flex flex-col justify-center items-center gap-2' : 'p-6 w-52 border-spacing-5 border-4 cursor-pointer rounded-2xl hover:fill-blue-500 hover:border-blue-500 hover:text-blue-500 group flex flex-col justify-center items-center gap-2 transition-all'" 
        >
        <svg
            :class="role == '3' ? 'fill-blue-500':'fill-gray-300 group-hover:fill-blue-500 transition-all'"
          xmlns="http://www.w3.org/2000/svg"
          id="Layer_1"
          height="100"
          viewBox="0 0 24 24"
          width="100"
          data-name="Layer 1"
        >
          <path
            d="m9 0h-4a5 5 0 0 0 -5 5v14a5 5 0 0 0 5 5h9v-19a5 5 0 0 0 -5-5zm-4 19h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm5 12h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm0-4h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm9-2h-3v19h3a5.006 5.006 0 0 0 5-5v-9a5.006 5.006 0 0 0 -5-5zm1 14a1 1 0 1 1 1-1 1 1 0 0 1 -1 1zm0-4a1 1 0 1 1 1-1 1 1 0 0 1 -1 1zm0-4a1 1 0 1 1 1-1 1 1 0 0 1 -1 1z"
          />
        </svg>
        <span :class="role == '3' ? 'text-2xl text-blue-500' : 'text-2xl text-gray-300 group-hover:text-blue-500 transition-all'">Company</span>
      </label>
      <input class="hidden" name="role" id="employee" value="2" v-model="role" placeholder="Email" type="radio" />
      <input class="hidden" name="role" id="company" value="3" v-model="role" placeholder="Password" type="radio" />
    </div>

    <button class="text-white p-3 rounded-lg bg-blue-400">Next</button>
  </form>
</template>

<script>
export default {
    data(){
        return {
            role : '2',
        }
    }
};
</script>

<style scoped>
form {
  min-width: 320px;
  max-width: 420px;
}
</style>