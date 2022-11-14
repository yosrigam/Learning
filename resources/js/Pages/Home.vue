<template>

    <h1 class="text-4xl font-bold">Home</h1>

</template>

<script>
import Nav from "../Shared/Nav.vue";
import Layout from "../Shared/Layout.vue"

export default {
  name: 'Home',
  layout: Layout,
  components: { Nav},

  props: {
    usernames: String,
  },

  data() {
    return {};
  },

  computed: {},

  methods: {},

  mounted() {
  },
};
</script>