<template>
  <Head title="Users"/>

  <div class="my-2 border-gray-200 flex justify-between">
    <h1 class="text-4xl font-bold">Users</h1>
    <Link :href="'/users/create'" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"> create new user</Link>
    <input type="text" placeholder="Search..." class=" border border-2 rounded-xl px-6" v-model="search">
  </div>


  <div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
      <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
          <tbody>
          <tr v-for="user in users.data" :key="user.id">
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <div class="flex items-center">
                <div class="ml-3">
                  <p class="text-gray-900 whitespace-no-wrap">
                    {{ user.name }}
                  </p>
                </div>
              </div>
            </td>
            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
              <Link :href="'/users/' + user.id + '/edit'" class="text-indigo-600 hover:text-indigo-900">edit</Link>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <Pagination :links="users.links"/>

</template>

<script>
import Nav from '../../Shared/Nav.vue'
import Layout from "../../Shared/Layout.vue";
import {Head} from '@inertiajs/inertia-vue3';
import {Link} from "@inertiajs/inertia-vue3";
import Pagination from "../../Shared/Pagination.vue";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

export default {
  //layout: Layout,
  name: 'Users.Index',

  components: {Pagination, Nav, Link, /*Head*/},

  props: {
    users: Object,
    filters: Object
  },

  data() {
    return {
      search: ref(this.$props.filters.search),
    };
  },

  watch: {
    search: value => {
      Inertia.get('/users', {search: value}, {
        preserveState: true,
        replace: true
      });
    },
  },

  computed: {},

  methods: {},

  mounted() {
  },
};
</script>