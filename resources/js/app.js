import "../css/app.css";
import AdminLayout from "./Pages/admin/Layout.vue"
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {ZiggyVue} from "ziggy-js";

createInertiaApp({
  title: title => `${title ? `${title} |` : ""} Siakad`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = !name.includes('auth') ? name.includes('admin') ? page.default.layout || AdminLayout : name.includes('student') ? page.default.layout || AdminLayout : AdminLayout : ""
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
})