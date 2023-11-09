<template>
  <div class="w-full h-full flex gap-4">
    <Poster :text="'Boost Your Career'"/>
    <FormContainer />
  </div> 
</template>

<script>
import Poster from '../components/Auth/Poster.vue';
import FormContainer from '../components/Auth/FormContainer.vue';

export default {
    components: { Poster, FormContainer },
    data(){
      return {
        
      }
    },
    
}
</script>

<style>

</style>