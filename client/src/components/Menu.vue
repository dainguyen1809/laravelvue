<template>
  <div>
    <a-menu :openKeys="openKeys" :selectedKeys="selectedKeys" mode="inline">
      <a-menu-item key="admin-users">
        <router-link :to="{ name: 'admin-users' }">
          <div class="d-flex align-items-center">
            <span><font-awesome-icon icon="user" /> Account </span>
          </div>
        </router-link>
      </a-menu-item>
      <a-menu-item key="admin-roles">
        <router-link :to="{ name: 'admin-roles' }">
          <div class="d-flex align-items-center">
            <span><font-awesome-icon icon="tag" /> Roles </span>
          </div>
        </router-link>
      </a-menu-item>
      <a-menu-item key="admin-settings">
        <router-link :to="{ name: 'admin-settings' }">
          <div class="d-flex align-items-center">
            <span><font-awesome-icon icon="gear" /> Settings </span>
          </div>
        </router-link>
      </a-menu-item>
    </a-menu>
  </div>
</template>

<script>
//composition API
import { UserOutlined } from "@ant-design/icons-vue";
import { defineComponent } from "vue";
import { storeToRefs } from "pinia";
import { useMenu } from "../store/menu";

export default defineComponent({
  components: {
    UserOutlined,
  },
  setup() {
    /* khi tham chieu den bien, obj
      -> su dung reactive de tham chieu cac bien ben trong
    */
    // const state = reactive({
    //   selectedKeys: ["admin-users"],
    //   openKeys: [],
    // });

    const store = useMenu();
    // const { selectedKeys, openKeys } = store; // lay nhung obj trong store

    /*
      return cac bien dang su dung de tham chieu den const state o tren
    */
    return {
      ...storeToRefs(store), //copy tat ca trong store
      // ...toRefs(state),
      // selectedKeys,
      // openKeys,
    };
  },
});
</script>
