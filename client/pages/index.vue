<template>
  <div class="flex">
    <!--
    <div v-if="user">{{ user }}</div>
    -->
    <recipes-list-component :recipes="recipes" @selection="setSelected" />
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
    selected: null
  }),
  computed: {
    ...mapState({
      user: state => state.user,
      recipes: state => state.recipes.list
    })
  },
  /*
  computed: {
    getUser () {
      return this.$store.state.user
    },
    getRecipes () {
      return this.$store.state.recipes.list
    }
  },
   */
  methods: {
    setSelected (index) {
      this.selected = this.recipes[index]
    }
  }
}
</script>

<style>

</style>
