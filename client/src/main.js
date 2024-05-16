import { createApp } from "vue";
import { createPinia } from "pinia";
import {
  Select,
  Input,
  InputPassword,
  Avatar,
  Table,
  Card,
  Menu,
  List,
  Drawer,
  Button,
  message,
} from "ant-design-vue";

import "./style.css";
import "ant-design-vue/dist/reset.css";
import "bootstrap/dist/css/bootstrap-grid.min.css";
import "bootstrap/dist/css/bootstrap-utilities.min.css";
// import "./static/fontawesome/css/all.min.css";

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { fab } from "@fortawesome/free-brands-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";

import axios from "axios";
window.axios = axios;

library.add(fas, fab, far);

import router from "./router";
import App from "./App.vue";

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.component("font-awesome-icon", FontAwesomeIcon);
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Menu);
app.use(Card);
app.use(Table);
app.use(Avatar);
app.use(Select);
app.use(Input);
app.use(InputPassword);
app.mount("#app");

app.config.globalProperties.$message = message;
