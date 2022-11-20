import {createApp, h} from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {InertiaProgress} from '@inertiajs/progress';
import Layout from "./Shared/Layout.vue";

createInertiaApp({
	resolve: (name) => {
		const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
		page.then((module) => {
			module.default.layout = Layout;
		});
		return page;
	},
	setup({el, App, props, plugin}) {
		createApp({render: () => h(App, props)})
			.use(plugin)
			.component('Link', Link)
			.component('Head', Head)
			.mount(el)
	},

	title: title => title + ' - MyApp' ,
});

InertiaProgress.init({
	delay: 250,
	color: '#088F8F',
	includeCSS: true,
	showSpinner: true,
})