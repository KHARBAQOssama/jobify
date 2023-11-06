<template>
    <form action="" class="w-full py-4 gap-4 flex flex-col">
          <input class="b bg-gray-100 p-3 w-full font-medium rounded-lg" placeholder="Email" type="email">
          <input class="b bg-gray-100 p-3 w-full font-medium rounded-lg" placeholder="Password" type="password">
          <p class="text-end text-sm">Forget Password ?</p>
          <button class="text-white p-3 rounded-lg bg-blue-400">Login</button>
          <p class="font-light text-sm">Do Not Have An Account? <span>Register</span></p>
    </form>
</template>

<script>
export default {

}
</script>

<style scoped>
form{
    min-width: 320px;
    max-width: 420px;
}
</style>