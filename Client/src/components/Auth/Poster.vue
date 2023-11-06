<template>
  <section class="h-full hidden md:flex">
    <div class="w-full h-full py-12 px-8 flex flex-col justify-center">
        <img src="../../../public/images/jobify-white-logo.png"  alt="">
        <p class="text-3xl font-bold italic text-white">{{text}}</p>
    </div>
  </section>
</template>

<script>
export default {
    props : ['text']
}
</script>

<style scoped>
section{
    width: 320px;
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url(../../../public/images/pexels-andrea-piacquadio-3778966.jpg);
}
div{
    background-color: #2A93D580;
}
</style>