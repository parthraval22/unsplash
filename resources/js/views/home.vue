<template>
    <section class="section">
      <div class="column is-12">
        <b-field label="Search anything....">
          <b-input
            v-model="query"
            @keyup.enter.native="reset(), search()"
            @icon-right-click="reset(), search()"
            size="is-large"
            icon-right="magnify"
            :icon-right-clickable="true"
          ></b-input>
        </b-field>
        <stack
          :column-min-width="300"
          :gutter-width="15"
          :gutter-height="15"
          monitor-images-loaded
        >
          <stack-item
            v-for="(image, i) in images"
            :key="i"
            style="transition: transform 300ms"
          >
            <b-button
              class="download-btn"
              type="is-danger"
              icon-left="download-outline"
              @click="download(image.urls.raw)"
            ></b-button>
            <img :src="image.urls.small" :alt="image.alt_description" />
          </stack-item>
        </stack>
        <b-field v-if="images.length">
          <b-button
            @click="search()"
            label="Load More"
            type="is-primary"
            expanded
          ></b-button>
        </b-field>
      </div>
    </section>
</template>

<script>
import { Stack, StackItem } from "vue-stack-grid";

export default {
  data() {
    return {
      query: "",
      images: [],
      page: 0,
    };
  },
  components: {
    Stack,
    StackItem,
  },
  methods: {
    reset() {
      this.page = 0;
      this.images = [];
    },
    search() {
      this.page++;
      axios
        .get(`api/search?query=${this.query}&page=${this.page}`)
        .then((response) => {
          this.images.push(...response.data);
        })
        .catch(() => {
          this.images = [];
        });
    },
    download(url) {
      axios
        .post(`api/download`,{'downloadURL':url})
        .then((response) => {
          console.log(response)
        })
        .catch(() => {
        });
    },
  },
};
</script>

<style>
</style>