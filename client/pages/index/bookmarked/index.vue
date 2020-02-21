<template>
  <div class="w-full">
    <img src="@/static/images/sent-love.png" alt="loves" class="center">
  </div>
</template>

<script>
  export default {
    middleware: ['restricted'],
  }
</script>

<style scoped>
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
</style>
