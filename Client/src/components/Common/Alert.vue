<template>
    <div v-if="message.content" :class="this.classGenerated + ' message show rounded-xl px-5 py-3 fixed flex gap-8 items-center'">
        <p>
            {{ message.content }}
        </p>
        <button @click="setMessage({})">x</button>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    computed: {
        ...mapGetters("userStore",{message : 'getMessage'}),
        classGenerated(){
            if(this.message && this.message.content)
                return this.message.type + ' show'
            else return '';
        }
    },
    methods:{
    }
}
</script>

<style>
.message{
    left: 50%;
    transform: translate(-50%, -100%);
    max-width: 90%;
    min-height: 70px;
    transition: transform .4s ease;
}
.message.show{
    transform: translate(-50%,60%);
    transition: transform .4s ease;
}
.message.info{
    background-color: rgba(0, 0, 255, 0.181);
    color: rgb(0, 94, 255);
}
.message.success{
    background-color: rgba(0, 255, 68, 0.181);
    color: rgb(10, 198, 0);
}
.message.danger{
    background-color: rgba(255, 0, 0, 0.181);
    color: rgb(198, 0, 0);
}
.message.warning{
    background-color: rgba(255, 187, 0, 0.181);
    color: rgb(198, 139, 0);
}
</style>