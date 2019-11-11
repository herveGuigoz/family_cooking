<template>
  <div class="flex">
    <!--
    <div v-if="user">{{ user }}</div>
    <div v-if="recipes">{{ recipes }}</div>
    -->
    <recipes-list-component :recipes="recipes" @selection="setSelected"/>
    <div class="bg-beige" v-if="recipes">
      {{ selected }}
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
import { mapState } from 'vuex'
import RecipesListComponent from "../components/Recipes/RecipesListComponent";
import ClapsComponent from '../components/Recipes/ClapsComponent'
export default {
  // middleware: ['restricted'],
  components: {
    ClapsComponent,
    RecipesListComponent
  },
  data: () => ({
    recipes: null,
    errors: null,
    selected: null
  }),
  computed: mapState([
    'user'
  ]),
  asyncData ({ req, params }) {
    // We can return a Promise instead of calling the callback
    req.headers.host = '0.0.0.0:8000'
    console.log(req.headers)
    return axios.get('/recipes.json')
      .then((response) => { this.recipes = response })
  },
  /*
  created () {
    if (this.user.token) {
      this.$axios.setToken(this.user.token, 'Bearer')
    }
    this.$axios
      .$get('/recipes.json')
      .then((response) => { this.recipes = response })
      .catch((e) => { this.errors = e })
      .finally()
  },
  methods: {
    setSelected (index) {
      this.selected = this.recipes[index]
    }
  }
  */
}
</script>

<style>

</style>
