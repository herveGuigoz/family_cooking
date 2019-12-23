<template>
  <div class="flex">
    <recipes-list-component :recipes="recipes" />
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
      recipes: state => state.list
    })
  }
}
</script>

<style>

</style>
