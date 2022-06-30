<template>
  <div>
    <header>
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
          <router-link class="navbar-brand" :to="{ name: 'home' }">
            BoolPress
          </router-link>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label=""
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item" v-for="item in menu_items" :key="item.id">
                <router-link class="nav-link" :to="{ name: item.link }">{{
                  item.name
                }}</router-link>
              </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto"></ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <router-view></router-view>
    </main>
    <footer class="py-5 bg-dark text-center text-white">
      <p class="m-0">Copyright&copy; Saba Alessandro&reg;</p>
    </footer>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      menu_items: [
        {
          id: 1,
          name: "Home",
          link: "home",
        },
        {
          id: 2,
          name: "About",
          link: "about",
        },
        {
          id: 3,
          name: "Posts",
          link: "posts",
        },
      ],
    };
  },
};
</script>

<style lang="scss">
main{
    height: calc(100vh - 174.10px);
    overflow-y: auto;
}
</style>

