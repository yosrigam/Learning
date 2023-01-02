<template>
  <Head title="Create new User"/>

  <h1 class="text-3xl">Create new user</h1>
  <form @submit.prevent="submit" class="max-w-md mx-auto mt-6">
    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
        name
      </label>
      <input class="border border-gray-400 px-4 py-2 w-full border rounded-xl" placeholder="User..."
             v-model="form.name">
	    <div v-if="$page.props.errors.name" v-text="$page.props.errors.name" class="text-red-500 text-xs mt-1"></div>
    </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
        E-mail
      </label>
      <input class="border border-gray-400 px-4 py-2 w-full border rounded-xl" placeholder="E-mail..."
             v-model="form.email">
	    <div v-if="$page.props.errors.email" v-text="$page.props.errors.email" class="text-red-500 text-xs mt-1"></div>
    </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="Password">
        Password
      </label>
      <input type="password" class="border border-gray-400 px-4 py-2 w-full border rounded-xl"
             placeholder="Password..."
             v-model="form.password">
	    <div v-if="$page.props.errors.password" v-text="$page.props.errors.password" class="text-red-500 text-xs mt-1"></div>
    </div>

    <div class="bm-6">
      <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
        Submit
      </button>
    </div>
  </form>
</template>

<script>
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";

export default {
  name: 'Users.Create',

  props: {
    user: Object,
  },

  setup() {
    const form = reactive({
      name: '',
      email: '',
      password: '',
    })

    function submit() {
      Inertia.post('/users', form)
    }

    return {form, submit}
  },

}
</script>
