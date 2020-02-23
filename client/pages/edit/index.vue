<template>
  <div>
    <div class="flex bg-white">
      <div
        v-for="(section, index) in sections"
        :key="index"
        class="flex-1 border border-gray-300 text-center text-brown p-3"
      >
        {{ section.name }}
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        sections: [
          { name: 'Titre', isActive: false },
          { name: 'Durée', isActive: false },
          { name: 'Ingredients', isActive: false },
          { name: 'Steps', isActive: false },
          { name: 'Preview', isActive: false }
        ]
      }
    }
  }
</script>

<style>

</style>
