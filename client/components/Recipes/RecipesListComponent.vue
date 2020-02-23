<template>
  <div class="flex flex-col relative w-full md:max-w-xs flex-grow flex-shrink-0 border-r bg-white text-brown md:block" :class="{hidden: !isVisible}">
    <div class="px-4 py-2 flex items-center justify-between border-b h-16">
      <div class="flex items-center justify-center w-full">
        <div class="block relative w-full">
          <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-gray-500"><path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z" /></svg>
          </span>
          <input
            placeholder="Search"
            class="block pl-9 pr-4 py-2 w-full border rounded-lg text-sm placeholder-gray-400 text-white focus:bg-white focus:placeholder-gray-600 text-brown focus:outline-none focus:border-verve-500"
          >
        </div>
      </div>
    </div>
    <div class="h-screen overflow-y-auto">
      <div
        v-for="recipe in recipes"
        :key="recipe.slug"
        class="block px-6 pt-3 pb-4 border-l-4 hover:bg-grey cursor-pointer"
        :class="{'border-teal-500 bg-grey': recipe.slug === selected}"
        @click="handleSelection(recipe.slug)"
      >
        <NuxtLink :to="path + recipe.slug">
          <p class="text-sm font-semibold">
            {{ recipe.title | truncate(38) }}
          </p>
          <div class="flex justify-between">
            <span class="text-xs text-brown">@{{ recipe.author.username | truncate(28) }}</span>
            <span class="text-xs text-brown">{{ recipe.totalTime }} min</span>
          </div>
          <p class="mt-1 text-sm text-brown break-words">
            <span
              v-for="(ingredient, index) in recipe.recipeIngredients"
              :key="index"
            >
              {{ ingredient.name | truncate(136) }}
            </span>
          </p>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  name: 'RecipesListComponent',
  props: {
    recipes: {
      type: Array,
      default: null
    },
    path: {
      type: String,
      default: '/'
    }
  },
  computed: {
    isVisible () {
      return this.selected === null
    },
    ...mapState({
      selected: state => state.selected
    })
  },
  methods: {
    handleSelection (slug) {
      this.$store.commit('SET_SELECTED', slug)
    }
  }
}
</script>
