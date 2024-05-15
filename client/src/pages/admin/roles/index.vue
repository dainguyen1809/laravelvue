<template>
  <div>Manage Roles</div>
</template>

<script>
import { useMenu } from "../../../store/menu";

export default {
  setup() {
    const store = useMenu();
    store.onSelectedKeys(["admin-roles"]);
  },
};
</script>
