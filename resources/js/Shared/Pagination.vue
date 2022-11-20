<template>
  <div>
    <Component is="Link"
               v-for="link in links"
               :href="link.url" v-html="link.label"
               :class=" {'mt-6 m-2 p-2 text-indigo-900 bg-indigo-200':true,'text-red-400 bg-red-200': !link.url , 'text-xl bg-indigo-400' : link.active }"

    />
  </div>
</template>

<script>
export default {
  name: 'Pagination',

  props: {
    links: Object,
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