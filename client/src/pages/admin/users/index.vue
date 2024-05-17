<template>
  <div>
    <a-card title="Accounts" :bordered="false" style="width: 100%">
      <div class="row mb-3">
        <div class="col-12 d-flex justify-content-end">
          <router-link :to="{ name: 'admin-users-create' }">
            <a-button type="primary">
              <font-awesome-icon icon="plus" />
            </a-button>
          </router-link>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <a-table :dataSource="users" :columns="columns" :scroll="{ x: 576 }">
            <template #bodyCell="{ column, index, record }">
              <template v-if="column.key === 'index'">
                <span>
                  {{ index + 1 }}
                </span>
              </template>
              <template v-if="column.key === 'status'">
                <span v-if="record.status_id == 1" class="text-primary">
                  {{ record.status }}
                </span>
                <span v-else-if="record.status_id == 2" class="text-danger">
                  {{ record.status }}
                </span>
              </template>
              <template v-if="column.key === 'action'">
                <router-link
                  :to="{
                    name: 'admin-users-edit',
                    params: { id: record.id },
                  }"
                >
                  <a-button type="primary" class="me-sm-2 mb-2">
                    <font-awesome-icon icon="pen-to-square" />
                  </a-button>
                </router-link>
                <a-button class="text-danger" @click="deleteUser(record.id)">
                  <font-awesome-icon icon="user-minus" />
                </a-button>
              </template>
            </template>
          </a-table>
        </div>
      </div>
    </a-card>
  </div>
</template>

<script>
import axios from "axios";
import { useMenu } from "../../../store/menu";
import { defineComponent, ref } from "vue";
import { columns } from "../../../configs/columns";
import { message } from "ant-design-vue";
import { ExclamationCircleOutlined } from "@ant-design/icons-vue";
import { createVNode } from "vue";
import { Modal } from "ant-design-vue";

export default defineComponent({
  setup() {
    const store = useMenu();
    store.onSelectedKeys(["admin-users"]);
    const users = ref([]);
    const getUsers = () => {
      axios
        .get("http://127.0.0.1:8000/api/users")
        .then((res) => {
          users.value = res.data;
        })
        .catch((e) => {
          console.log(e);
        });
    };

    // const getUsers = async () => {
    //   try {
    //     const res = await axios.get("http://127.0.0.1:8000/api/user");
    //     console.log(res);
    //   } catch (error) {
    //     console.log(error);
    //   }
    // };

    const deleteUser = (id) => {
      Modal.confirm({
        title: "Do you want to delete this user?",
        icon: createVNode(ExclamationCircleOutlined),
        content: "When clicked the OK button, this user will be delete",
        onOk() {
          axios
            .delete(`http://127.0.0.1:8000/api/users/delete/${id}`)
            .then((res) => {
              if (res.status == 200) {
                message.success("Deleted !");
                getUsers();
              }
            })
            .catch((e) => {
              console.log(e);
            });
        },
        // eslint-disable-next-line @typescript-eslint/no-empty-function
        cancelText: "Cancel",
        onCancel() {
          Modal.destroyAll();
        },
      });
    };

    getUsers();

    return {
      users,
      columns,
      deleteUser,
    };
  },
});
</script>
