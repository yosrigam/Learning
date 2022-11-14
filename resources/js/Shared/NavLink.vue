<template>
  <Link class="text-blue-500 hover:underline hover:text-blue-600"
        :class="{'font-bold underline': active}"
  >
    <slot />
  </Link>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'

export default {
  name: 'NavLink',

  components: {Link},

  props: {
    active: Boolean,
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