<template>
    <input
        :type="type"
        :value="value"
        @input="$emit('input', $event)"
        placeholder="Enter text"
    />
</template>

<script>
export default {
    props: ['value','type'],
};
</script>
