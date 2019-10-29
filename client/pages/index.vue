<template>
  <div class="">
    <!--
    <div v-if="user">{{ user }}</div>
    <div v-if="recipes">{{ recipes }}</div>
    -->
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  // middleware: ['restricted'],
  data: () => ({
    recipes: null,
    errors: null
  }),
  computed: mapState([
    'user'
  ]),
  mounted () {
    this.$nextTick(function () {
      this.$nuxt.$loading.start()
      this.$axios.$get('/recipes.json')
        .then((response) => { this.recipes = response })
        .catch((e) => { this.errors = e })
        .finally(this.$nuxt.$loading.finish())
    })
  },
  method: {

  }
}
</script>

<style>

</style>
