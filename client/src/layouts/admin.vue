<template>
  <div>
    <Header />

    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-sm-3 d-none d-sm-flex">
          <a-list bordered style="width: 100%">
            <Menu />
            <template #header>
              <div>Sidebar</div>
            </template>
          </a-list>
        </div>
        <div class="col-12 col-sm-9">
          <router-view></router-view>
        </div>
      </div>
    </div>
    <!-- hien thi cac routes con  -->
  </div>
</template>

<script>
import Header from "../components/Header.vue";
import Menu from "../components/Menu.vue";

export default {
  components: {
    Header,
    Menu,
  },
};
</script>
