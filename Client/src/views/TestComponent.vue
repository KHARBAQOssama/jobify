<template>
    <form>
        <p>Value: {{ inputValue }}</p>
        <custom-input :value="inputValue" :type="'password'"
            @input="inputValue = $event.target.value" />
    </form>
</template>

<script>
import CustomInput from '../components/Custom/CustomInput.vue';

export default {
    components: {
        CustomInput,
    },
    data() {
        return {
        inputValue: '',
        };
    },
};
</script>
  