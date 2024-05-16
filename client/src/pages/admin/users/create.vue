<template>
  <div>
    <a-card title="Add a new account" style="width: 100%">
      <div class="row">
        <div class="col-sm-4">
          <div class="row">
            <div class="col-12 mb-3 d-flex justify-content-center">
              <a-avatar shape="square" :size="250">
                <template #icon>
                  <img src="" alt="avatar" />
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

        <div class="col-12 col-sm-5">
          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>Status:</span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-select
                show-search
                placeholder="Select status"
                style="width: 100%"
                :options="[]"
                :filter-option="[]"
              ></a-select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>Username:</span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Enter username" allow-clear />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>FullName:</span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Enter your name" allow-clear />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>Email:</span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Enter your email" allow-clear />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>Departments:</span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-select
                show-search
                placeholder="Select departments"
                style="width: 100%"
                :options="[]"
                :filter-option="[]"
              ></a-select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>Password:</span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Password" allow-clear />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label for="">
                <span class="text-danger me-2">*</span>
                <span>Confirm Password:</span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Confirm Password" allow-clear />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
          <a-button class="me-0 me-sm-2 mb-3 mb-sm-0">
            <router-link :to="{ name: 'admin-users' }"> Cancel </router-link>
          </a-button>
          <a-button type="primary">
            <span>Save</span>
          </a-button>
        </div>
      </div>
    </a-card>
  </div>
</template>

<script>
import { useMenu } from "../../../store/menu";

export default {
  setup() {
    useMenu().onSelectedKeys(["admin-users"]);
  },
};
</script>
