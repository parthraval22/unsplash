<template>
  <section class="section">
    <div class="column is-12">
      <stack
        :column-min-width="300"
        :gutter-width="15"
        :gutter-height="15"
        monitor-images-loaded
      >
        <stack-item
          v-for="(image, i) in data"
          :key="i"
          style="transition: transform 300ms"
        >
          <img :src="`/storage/${image.path}`" :alt="image.id" />
        </stack-item>
      </stack>
    </div>
  </section>
</template>

<script>
import { Stack, StackItem } from "vue-stack-grid";

export default {
  data() {
    return {
      data: [],
    };
  },
  components: {
    Stack,
    StackItem,
  },
  methods: {
    fetch() {
      this.data = [];
      axios
        .get(`api/myDownloads`)
        .then((response) => {
          this.data.push(...response.data);
        })
        .catch(() => {
          this.data = [];
        });
    },
  },
  mounted() {
    this.fetch();
  },
};
</script>

<style>
</style>