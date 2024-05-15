<template>
  <div>Settings</div>
</template>

<script>
import { useMenu } from "../../../store/menu";

export default {
  setup() {
    const store = useMenu();
    store.onSelectedKeys(["admin-settings"]);
  },
};
</script>
