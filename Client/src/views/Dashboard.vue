<template>
  <div>
    Hello
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    computed:{
        ...mapGetters("userStore", { user: `getUser`, profile: `getProfile` }),
    }
}
</script>

<style>

</style>