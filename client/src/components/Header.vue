p
<template>
  <div class="container-fluid">
    <div class="row align-items-center bg-primary text-white">
      <div
        class="col-1 d-flex d-sm-none align-items-center justify-content-center"
      >
        <span @click="showCategories()">
          <font-awesome-icon icon="align-justify" />
        </span>
      </div>

      <div
        class="col-10 col-sm-8 d-flex align-items-center justify-content-start justify-content-sm-start"
      >
        <img
          src="https://th.bing.com/th/id/OIP.h__DONCPzbzgY3xmArSFagHaHa?rs=1&pid=ImgDetMain"
          alt="Logo"
          width="40"
          height="42"
          class="ms-3 me-3"
        />
        <span class="d-none d-sm-flex">LARAVEL-VUE</span>
      </div>

      <div
        class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end"
      >
        <template>
          <a-collapse :open="activeKey">
            <a-collapse-panel key="1" header="This is panel header 1">
              <p>Admin</p>
            </a-collapse-panel>
            <a-collapse-panel key="2" header="This is panel header 2">
              <p>{{ text }}</p>
            </a-collapse-panel>
            <a-collapse-panel
              key="3"
              header="This is panel header 3"
              collapsible="disabled"
            >
              <p>{{ text }}</p>
            </a-collapse-panel>
          </a-collapse>
        </template>
      </div>

      <div
        class="col-1 d-flex d-sm-none align-items-center justify-content-center"
      >
        <span @click="showAdmin()">
          <font-awesome-icon icon="user" />
        </span>
      </div>
    </div>

    <a-drawer
      :open="open"
      title="Categories"
      placement="left"
      @update:open="(val) => (open = val)"
    >
      <Menu />
    </a-drawer>

    <a-drawer
      :open="open_admin"
      title="Admin"
      placement="right"
      @update:open="(val) => (open_admin = val)"
    >
      <p>Profile</p>
      <p>Logout</p>
    </a-drawer>
  </div>
</template>

<script>
import { defineComponent, ref } from "vue";
import Menu from "./Menu.vue";

export default defineComponent({
  components: {
    Menu,
  },
  setup() {
    const open = ref(false);
    const open_admin = ref(false);

    const showCategories = () => {
      open.value = !open.value;
    };

    const showAdmin = () => {
      open_admin.value = !open_admin.value;
    };

    return {
      open,
      open_admin,
      showCategories,
      showAdmin,
    };
  },
});
</script>
