<template>
  <b-navbar class="box mb-0" :mobile-burger="false">
    <template #brand>
      <b-navbar-item tag="router-link" :to="{ path: '/' }">
        <img
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Unsplash_wordmark_logo.svg/2560px-Unsplash_wordmark_logo.svg.png"
          alt="Splash"
        />
      </b-navbar-item>
      <b-navbar-item class="downloadMenuBtn" tag="router-link" :to="{ path: '/downloads' }">
        <b-button icon-left="file-download" type="is-primary">
          My Files
        </b-button>
      </b-navbar-item>
    </template>
  </b-navbar>
</template>

<script>
export default {};
</script>