<template>
  <div>
    <form @submit.prevent="submitUser()">
      <a-card title="Add a new account" style="width: 100%">
        <div class="row">
          <div class="col-sm-4">
            <div class="row">
              <div class="col-12 mb-3 d-flex justify-content-center">
                <a-avatar shape="square" :size="250">
                  <template #icon>
                    <img src="" alt="" />
                  </template>
                </a-avatar>
              </div>
              <div class="col-12 d-flex justify-content-center">
                <a-button type="primary">
                  <span>
                    <font-awesome-icon
                      icon="arrow-up-from-bracket"
                      class="me-2"
                    />
                    Upload
                  </span>
                </a-button>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="row mb-3">
              <div class="col-12 col-sm-3 text-start text-sm-end">
                <label for="">
                  <span class="text-danger me-2">*</span>
                  <span
                    :class="{
                      'text-danger': errors.status_id,
                    }"
                  >
                    Status:
                  </span>
                </label>
              </div>
              <div class="col-12 col-sm-6">
                <a-select
                  show-search
                  placeholder="Select status"
                  :options="user_status"
                  :filter-option="filterOption"
                  v-model:value="status_id"
                  style="width: 100%"
                  allow-clear
                ></a-select>
                <div class="w-100 m-2"></div>
                <small v-if="errors.status_id" class="text-danger">{{
                  errors.status_id[0]
                }}</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 col-sm-3 text-start text-sm-end">
                <label for="">
                  <span class="text-danger me-2">*</span>
                  <span
                    :class="{
                      'text-danger': errors.username,
                    }"
                    >Username:</span
                  >
                </label>
              </div>
              <div class="col-12 col-sm-6">
                <a-input
                  placeholder="Enter username"
                  allow-clear
                  v-model:value="username"
                />
                <div class="w-100 m-2"></div>
                <small v-if="errors.username" class="text-danger">{{
                  errors.username[0]
                }}</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 col-sm-3 text-start text-sm-end">
                <label for="">
                  <span class="text-danger me-2">*</span>
                  <span
                    :class="{
                      'text-danger': errors.name,
                    }"
                    >FullName:</span
                  >
                </label>
              </div>
              <div class="col-12 col-sm-6">
                <a-input
                  placeholder="Enter your name"
                  allow-clear
                  v-model:value="name"
                />
                <div class="w-100 m-2"></div>
                <small v-if="errors.name" class="text-danger">{{
                  errors.name[0]
                }}</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 col-sm-3 text-start text-sm-end">
                <label for="">
                  <span class="text-danger me-2">*</span>
                  <span
                    :class="{
                      'text-danger': errors.email,
                    }"
                    >Email:</span
                  >
                </label>
              </div>
              <div class="col-12 col-sm-6">
                <a-input
                  placeholder="Enter your email"
                  allow-clear
                  v-model:value="email"
                />
                <div class="w-100 m-2"></div>
                <small v-if="errors.email" class="text-danger">{{
                  errors.email[0]
                }}</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 col-sm-3 text-start text-sm-end">
                <label for="">
                  <span class="text-danger me-2">*</span>
                  <span
                    :class="{
                      'text-danger': errors.department_id,
                    }"
                    >Department:</span
                  >
                </label>
              </div>
              <div class="col-12 col-sm-6">
                <a-select
                  show-search
                  placeholder="Select department"
                  style="width: 100%"
                  :options="department"
                  :filter-option="filterOption"
                  v-model:value="department_id"
                  allow-clear
                >
                </a-select>
                <div class="w-100 m-2"></div>
                <small v-if="errors.department_id" class="text-danger">{{
                  errors.department_id[0]
                }}</small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 col-sm-3 text-start text-sm-end">
                <label for="">
                  <span class="text-danger me-2">*</span>
                  <span
                    :class="{
                      'text-danger': errors.password,
                    }"
                    >Password:</span
                  >
                </label>
              </div>
              <div class="col-12 col-sm-6">
                <a-input-password
                  placeholder="Password"
                  allow-clear
                  v-model:value="password"
                />
                <div class="w-100 m-2"></div>
                <small v-if="errors.password" class="text-danger">
                  {{ errors.password[0] }}
                </small>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12 col-sm-3 text-start text-sm-end">
                <label for="">
                  <span class="text-danger me-2">*</span>
                  <span
                    :class="{
                      'text-danger': errors.password,
                    }"
                    >Confirm Password:</span
                  >
                </label>
              </div>
              <div class="col-12 col-sm-6">
                <a-input-password
                  placeholder="Confirm Password"
                  allow-clear
                  v-model:value="password_confirmation"
                />
                <div class="w-100 m-2"></div>
                <small v-if="errors.password" class="text-danger">{{
                  errors.password[1]
                }}</small>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
            <a-button class="me-0 me-sm-2 mb-3 mb-sm-0">
              <router-link :to="{ name: 'admin-users' }"> Cancel </router-link>
            </a-button>
            <a-button type="primary" html-type="submit">
              <span>Save</span>
            </a-button>
          </div>
        </div>
      </a-card>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import { defineComponent, reactive, ref, toRefs } from "vue";
import { useMenu } from "../../../store/menu";
import { message } from "ant-design-vue";
import { useRouter } from "vue-router";

export default defineComponent({
  setup() {
    useMenu().onSelectedKeys(["admin-users"]);
    const router = useRouter();
    const user_status = ref([]);
    const department = ref([]);
    const users = reactive({
      username: "",
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      department_id: [],
      status_id: [],
    });

    const errors = ref({});

    const createUser = () => {
      axios
        .get("http://127.0.0.1:8000/api/users/create")
        .then((res) => {
          user_status.value = res.data.user_status;
          department.value = res.data.department;
        })
        .catch((e) => {
          console.log(e);
        });
    };

    const filterOption = (input, option) => {
      return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
    };

    const submitUser = () => {
      axios
        .post("http://127.0.0.1:8000/api/users/store", users)
        .then((res) => {
          if (res) {
            message.success("Create user success ☻");
            router.push({ name: "admin-users" });
          } else {
            message.error("An error has occured");
          }
        })
        .catch((error) => {
          // console.log(error);
          errors.value = error.response.data.errors;
        });
    };

    createUser();

    return {
      user_status,
      department,
      ...toRefs(users),
      filterOption,
      submitUser,
      errors,
    };
  },
});
</script>
