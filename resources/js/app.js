import { createApp, h } from 'vue'
import {createInertiaApp, Link} from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress';

createInertiaApp({
	resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
	setup({ el, App, props, plugin }) {
		createApp({ render: () => h(App, props) })
			.use(plugin)
			.component('Link',Link)
			.mount(el)
	},
});

InertiaProgress.init({
	delay: 250,
	color: '#088F8F',
	includeCSS: true,
	showSpinner: true,
})