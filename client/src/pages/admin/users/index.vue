<template>
  <div>
    <a-card title="Accounts" :bordered="false" style="width: 100%">
      <div class="row">
        <div class="col-12">
          <a-table :dataSource="users" :columns="columns">
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

export default defineComponent({
  setup() {
    const store = useMenu();
    store.onSelectedKeys(["admin-users"]);
    const users = ref([]);
    const getUsers = () => {
      axios
        .get("http://127.0.0.1:8000/api/user")
        .then((res) => {
          users.value = res.data;
          console.log(res.data);
          // //tra ve api
          // console.log(users);
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

    getUsers();

    return {
      users,
      columns,
    };
  },
});
</script>
