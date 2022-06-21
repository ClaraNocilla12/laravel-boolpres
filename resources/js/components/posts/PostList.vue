<template>
  <div>
    <Loader v-if="isLoading" />

    <div v-if="posts.length">
      <!-- <div class="d-flex justify-content-center">
      <Pagination :pagination="pagination"/>
      </div> -->
 
      <div class="container">
        <div class="card text-center mb-3" v-for="post in posts" :key="post.id">
          <div class="card-header">
            {{ post.title }} -
            <!-- {{post.category.label}} -->

          </div>
          <div class="card-body ">
            <p class="card-title">
              <span
                v-for="tag in post.tags"
                :key="tag.id"
                class="badge m-1"
                :style="`background-color: ${tag.color}`"
                >{{ tag.label }}</span
              >
            </p>
            <p class="card-text">{{ post.content }}</p>
          </div>
          <router-link :to="{ name: 'post-detail', params: { id: post.id } }">Details</router-link>
          <div class="card-footer text-muted">{{post.updated_at}}</div>
        </div>
      </div>
      
    </div>
    <p v-else>Non ci sono post</p>
    <div class="d-flex justify-content-center">
      <Pagination :pagination="pagination"/>
      </div>
  </div>
    
</template>

<script>
import axios from "axios";
import Loader from "../Loader.vue";
import Pagination from "../Pagination.vue";

export default {
  name: "PostList",
  components: {
    Loader,
    Pagination,
  },
  data() {
    return {
      posts: [],
      pagination: {},
      isLoading: true,
    };
  },
  methods: {
    getPosts() {
      axios
        .get("http://127.0.0.1:8000/api/posts")
        .then((res) => {
          const { data, current_page, last_page } = res.data.posts;

          this.posts = res.data.posts.data;

          this.pagination = {
            lastPage: last_page,
            currentPage: current_page,
          };

          console.log(this.pagination);
          console.log(this.posts);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },

  mounted() {
    this.getPosts();
  },
};
</script>

