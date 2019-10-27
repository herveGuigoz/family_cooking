<template>
  <div class="">
    <div v-if="user">{{ user }}</div>
    <div v-if="recipes">{{ recipes }}</div>
  </div>
</template>

<script>
  import { mapState } from 'vuex'
export default {
  //middleware: ['restricted'],
  computed: mapState([
    'user'
  ]),
  components: {

  },
  data: () => ({
    recipes: null
  }),
  mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        this.$axios.$get('/recipes.json')
          .then(response => this.recipes = response)
          .catch(e => console.log(e))
          .finally(this.$nuxt.$loading.finish())
      })
  },
  method: {

  }
}
</script>

<style>

</style>
