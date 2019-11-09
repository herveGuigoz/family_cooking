<template>
  <div class="flex">
    <!--
    <div v-if="user">{{ user }}</div>
    <div v-if="recipes">{{ recipes }}</div>
    -->
    <recipes-list-component :recipes="recipes"/>
    <div class="bg-beige" v-if="recipes">
      {{ recipes[0] }}
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import RecipesListComponent from "../components/Recipes/RecipesListComponent";
import ClapsComponent from '../components/Recipes/ClapsComponent'
export default {
  // middleware: ['restricted'],
  components: {
    ClapsComponent,
    RecipesListComponent
  },
  async asyncData ({ app }) {
    console.log(app)
    const { data } = await app.$axios.get('http://0.0.0.0:8000/recipes.json')
    console.log(data)
    // return { recipes: data }
  },
  data: () => ({
    recipes: null,
    errors: null
  }),
  computed: mapState([
    'user'
  ]),
  /*
  created () {
    this.$axios.$get('/recipes.json')
      .then((response) => { this.recipes = response })
      .catch((e) => { this.errors = e })
      .finally()
  },
  */
  method: {

  }
}
</script>

<style>

</style>
