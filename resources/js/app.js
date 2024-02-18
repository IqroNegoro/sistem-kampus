import "../css/app.css";
import Layout from "./Pages/Layout.vue"
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {ZiggyVue} from "ziggy-js";

createInertiaApp({
  title: title => `${title ? `${title} |` : ""} Siakad`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    page.default.layout = !name.includes('auth') ? page.default.layout || Layout : ""
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
})