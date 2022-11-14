<template>

    <h1 class="text-4xl font-bold">Users</h1>

    <div>
      <p> {{ x }} the current time is {{ time }} </p>
      <Link href="/users" class="text-blue-500" preserve-scroll> refresh</Link>
    </div>

</template>

<script>
import Nav from '../Shared/Nav.vue'
import Layout from "../Shared/Layout.vue";

export default {
  layout: Layout,
  name: 'Users',

  components: {Nav},

  props: {
    time: String,
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