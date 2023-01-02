<template>
	<h1 class="text-3xl">Edit user</h1>
	<form @submit.prevent="submit" class="max-w-md mx-auto mt-6">
		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
				name
			</label>
			<input class="border border-gray-400 px-4 py-2 w-full border rounded-xl" placeholder="User..."
			       v-model="form.name">
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
				E-mail
			</label>
			<input class="border border-gray-400 px-4 py-2 w-full border rounded-xl" placeholder="E-mail..."
			       v-model="form.email">
		</div>

		<div class="bm-6">
			<button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
				Submit
			</button>
		</div>
	</form>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";

export default {
	name: 'Users.Edit',

	components: {},

	props: {
		user: Object,
	},

	data() {
		return {
			form: {
				id: this.user.id,
				name: this.user.name,
				email: this.user.email,
			}
		};
	},

	methods: {
		submit() {
			Inertia.put('/users', this.form)
		},
	}
}
</script>
