<template>
  <div>
    <JumboComponent></JumboComponent>
    <div class="container-fluid py-5">
      <div class="row">
        <div class="col-2">
          <aside>
            <div class="categories widget">
              <h2>All Categories</h2>
              <ul class="list-unstyled">
                <li v-for="category in categories" :key="category.id">
                  {{ category.name }}
                </li>
              </ul>
            </div>
            <div class="tags widget">
              <h2>All Tags</h2>
              <ul class="list-unstyled">
                <li v-for="tag in tags" :key="tag.id">
                  {{ tag.name }}
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <div class="col-10">
          <main>
            <div class="container">
              <div class="row row-cols-1 row-cols-md-3">
                <div
                  class="col mb-4"
                  v-for="post in post_request.data"
                  :key="post.id"
                >
                  <div class="card h-100">
                    <img
                      class="img-fluid"
                      :src="'storage/' + post.image"
                      :alt="post.title"
                    />
                    <div class="card-body">
                      <h3>{{ post.title }}</h3>
                      <p>{{ post.body }}</p>
                    </div>
                    <div class="card-footer d-flex">
                      <div class="author" v-if="post.user">
                        <strong>Author: </strong> {{ post.user.name }}
                      </div>
                      <div class="container-fluid text-center">
                        <div class="row">
                          <div class="col-12" v-if="post.category">
                            <strong>Category: </strong> {{ post.category.name }}
                          </div>
                          <div class="col-12" v-if="post.tags.length > 0">
                            <div class="text-center">
                              <strong>Tags: </strong>
                              <span v-for="tag in post.tags" :key="tag.id">
                                #{{ tag.name }}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item" v-if="post_request.current_page > 1">
                  <a
                    class="page-link"
                    href="#"
                    aria-label="Previous"
                    @click="getAllPost(post_request.current_page - 1)"
                  >
                    <span aria-hidden="true">&laquo;</span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                </li>
                <li
                  :class="{
                    'page-item': true,
                    active: post_request.current_page == page,
                  }"
                  v-for="page in post_request.last_page"
                  :key="page"
                >
                  <a class="page-link" href="#" @click="getAllPost(page)">{{
                    page
                  }}</a>
                </li>
                <li
                  class="page-item"
                  v-if="post_request.current_page < post_request.last_page"
                >
                  <a
                    class="page-link"
                    href="#"
                    aria-label="Next"
                    @click="getAllPost(post_request.current_page + 1)"
                  >
                    <span aria-hidden="true">&raquo;</span>
                    <span class="visually-hidden">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </main>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import JumboComponent from "../components/JumboComponent.vue";

export default {
  name: "App",
  components: {
    JumboComponent,
  },
  data() {
    return {
      post_request: "",
      categories: "",
      tags: "",
    };
  },
  methods: {
    getAllPost(postPage) {
      axios
        .get("api/posts", {
          params: {
            page: postPage,
          },
        })
        .then((response) => {
          this.post_request = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    getAllCategory() {
      axios
        .get("api/categories")
        .then((response) => {
          this.categories = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    getAllTag() {
      axios
        .get("api/tags")
        .then((response) => {
          this.tags = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
  mounted() {
    this.getAllPost();
    this.getAllCategory();
    this.getAllTag();
  },
};
</script>

<style lang="scss" scoped>
aside {
  .widget {
    margin-bottom: 1rem;
    padding: 1rem;
    background-color: rgb(231, 228, 228);
    border-radius: 1rem;
  }
}
.card {
  img {
    aspect-ratio: 1 / 1;
  }
}
</style>
