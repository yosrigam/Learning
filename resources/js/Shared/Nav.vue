<template>
  <nav>
    <ul class="flex list-disc space-x-6 list-inside">
      <li>
        <NavLink href="/" :active="$page.component==='Home'">
          Home
        </NavLink>
      </li>
      <li>
        <NavLink href="/users"
                 :active="$page.component==='Users'">
          Users
        </NavLink>
      </li>
      <li>
        <NavLink href="/settings" class="text-blue-500 hover:underline hover:text-blue-600"
              :active="$page.component==='Settings'">
          settings
        </NavLink>
      </li>
      <li>
         <Link href="/logout" method="POST" as="button" class="text-blue-500 hover:underline hover:text-blue-600" :data="{foo:'Hi'}">
          logout
        </Link>
      </li>
    </ul>
  </nav>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'
import NavLink from "../Shared/NavLink.vue";

export default {
  name: 'Nav',
  components: {Link, NavLink},
  props: {},

  data() {
    return {};
  },

  computed: {},

  methods: {},

  mounted() {
  },
};
</script>