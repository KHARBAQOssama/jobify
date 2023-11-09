<script>
import Alert from './components/Common/Alert.vue';
import { mapActions } from 'vuex';

export default {
  components :{
    Alert
  },
  methods:{
    ...mapActions('userStore',['getAuthUser']),
  },
  mounted(){
    this.getAuthUser();
  }
}
</script>

<template>
  <Alert></Alert>
  <router-view></router-view>
</template>

<style scoped>
</style>
