import "./bootstrap";
import router from "./router/router";

import { createApp } from "vue";
import App from "./components/App.vue";

createApp(App).use(router).mount("#app");
