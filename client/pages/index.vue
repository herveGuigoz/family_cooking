<template>
  <div class="flex">
    <recipes-list-component :recipes="getRecipesList" :path="getPath" />
    <div class="w-full">
      <NuxtChild :key="$route.params.slug" />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import RecipesListComponent from '../components/Recipes/RecipesListComponent'
export default {
  components: {
    RecipesListComponent
  },
  data: () => ({
    errors: null
  }),
  computed: {
    ...mapState({
      user: state => state.user,
      recipes: state => state.list,
      bookmarked: state => state.list.filter(recipe => recipe.isBookmarked)
    }),
    getRecipesList() {
      const patern = /\/bookmarked/
      return patern.test(this.$nuxt.$route.path) ? this.bookmarked : this.recipes
    },
    getPath() {
      const patern = /\/bookmarked/
      return patern.test(this.$nuxt.$route.path) ? '/bookmarked/' : '/'
    }
  }
}
</script>

<style>

</style>
