<template>
  <slot/>
</template>

<script>
    import {Link} from "@inertiajs/inertia-vue3"
    export default {
        props: {
            title: String
        },

        components: {
            Link,
        }
    }
</script>

