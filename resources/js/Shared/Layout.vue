<template>

  <section class="p-6 bg-gray-200">
    <Header class="flex justify-between">
      <div class="flex items-center">
      <h1 class="font-bold text-lg">
        My App
      </h1>
      <p class="text-sm ml-4">Welcome Back, {{ username }} </p>
      </div>
      <Nav/>
    </Header>
  </section>

  <section class="p-6">
    <div class="max-w-3xl m-auto">
      <slot/>
    </div>
  </section>

</template>

<script>
import Nav from "./Nav.vue";

export default {
  name: 'Layout.vue',
  components: {Nav},
  props: {
  },

  data() {
    return {};
  },

  computed: {
    username(){return this.$page.props.auth.user.username}
  },

  methods: {},

  mounted() {
  },

};
</script>