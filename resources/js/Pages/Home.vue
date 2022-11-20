<template>
  <Head title="Home">
  </Head>
  <h1 class="text-4xl font-bold">Home</h1>
</template>

<script>
import Nav from "../Shared/Nav.vue";
import Layout from "../Shared/Layout.vue"
import {Head} from '@inertiajs/inertia-vue3'

export default {
  name: 'Home',
  //layout: Layout,
  components: {Nav, /*Head*/},

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