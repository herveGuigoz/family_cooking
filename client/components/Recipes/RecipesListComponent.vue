<template>
  <div class="flex flex-col relative w-full md:max-w-xs flex-grow flex-shrink-0 border-r bg-white">
    <div class="px-4 py-2 flex items-center justify-between border-b">
      <button class="flex items-center text-xs font-semibold text-gray-500">
        Sorted by Date
        <svg viewBox="0 0 24 24" class="ml-1 h-6 w-6 fill-current text-gray-500">
          <path
            d="M7.293 9.293a1 1 0 011.414 0L12 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          />
        </svg>
      </button>
      <button>
        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current text-gray-500">
          <path
            d="M16 3H3a1 1 0 000 2h13a1 1 0 100-2zm-4 4H3a1 1 0 000 2h9a1 1 0 100-2zm-9 4h6a1 1 0 110 2H3a1 1 0 110-2zm9.293.293l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L18 10.414V20a1 1 0 11-2 0v-9.586l-2.293 2.293a1 1 0 01-1.414-1.414z"
          />
        </svg>
      </button>
    </div>
    <div class="py-2 flex items-center justify-center border-l-4">
      <div class="block relative w-64">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
          <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-gray-500"><path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z" /></svg>
        </span>
        <input placeholder="Search" class="block pl-9 pr-4 py-2 w-full border rounded-lg text-sm placeholder-gray-400 text-white focus:bg-white focus:placeholder-gray-600 focus:text-gray-900 focus:outline-none">
      </div>
    </div>
    <div class="h-screen overflow-y-auto">
      <div
        v-for="(recipe, index) in recipes"
        :key="index"
        class="block px-6 pt-3 pb-4 border-l-4 hover:bg-gray-100 cursor-pointer"
        :class="{'border-teal-500 bg-gray-100': index === selected}"
        @click="handleSelection(index)"
      >
        <NuxtLink :to="'/' + recipe.slug">
          <p class="text-sm font-semibold text-gray-900">
            {{ recipe.title | truncate(38) }}
          </p>
          <div class="flex justify-between">
            <span class="text-xs text-brown">@{{ recipe.Author.username | truncate(28) }}</span>
            <span class="text-xs text-brown">{{ recipe.totalTime }}min</span>
          </div>
          <p class="mt-1 text-sm text-brown break-words">
            <span
              v-for="(ingredient, index) in recipe.recipeIngredient"
              :key="index"
            >
              {{ Object.keys(ingredient)[0] | truncate(136) }}
            </span>
          </p>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'RecipesListComponent',
  props: {
    recipes: {
      type: Function,
      default: null
    }
  },
  data: () => ({
    selected: null
  }),
  methods: {
    handleSelection (index) {
      this.selected = index
      this.$emit('selection', index)
    }
  }
}
</script>
