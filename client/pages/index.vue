<template>
  <div class="flex">
    <!--
    <div v-if="user">{{ user }}</div>
    -->
    <recipes-list-component :recipes="recipes" />
    <div>
      <NuxtChild :key="$route.params.slug" />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import RecipesListComponent from '../components/Recipes/RecipesListComponent'
import ClapsComponent from '../components/Recipes/ClapsComponent'
export default {
  middleware: ['recipes'],
  components: {
    ClapsComponent,
    RecipesListComponent
  },
  data: () => ({
    errors: null,
  }),
  computed: {
    ...mapState({
      user: state => state.user,
      recipes: state => state.recipes.list
    })
  }
}
</script>

<style>

</style>
