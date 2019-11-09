<template>
  <div class="flex flex-col relative w-full md:max-w-xs flex-grow flex-shrink-0 border-r bg-white">
    <div class="px-4 py-2 flex items-center justify-between border-b">
      <button class="flex items-center text-xs font-semibold text-gray-600">
        Sorted by Date
        <svg viewBox="0 0 24 24" class="ml-1 h-6 w-6 fill-current text-gray-500">
          <path
            d="M7.293 9.293a1 1 0 011.414 0L12 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z">
          </path>
        </svg>
      </button>
      <button>
        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current text-gray-500">
          <path
            d="M16 3H3a1 1 0 000 2h13a1 1 0 100-2zm-4 4H3a1 1 0 000 2h9a1 1 0 100-2zm-9 4h6a1 1 0 110 2H3a1 1 0 110-2zm9.293.293l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L18 10.414V20a1 1 0 11-2 0v-9.586l-2.293 2.293a1 1 0 01-1.414-1.414z">
          </path>
        </svg>
      </button>
    </div>
    <div class="h-screen overflow-y-auto">
      <div
        v-for="(recipe, index) in recipes"
        :key="index"
        @click="selected = index"
        class="block px-6 pt-3 pb-4 border-l-4 cursor-pointer"
        :class="{'border-teal-500 bg-gray-100': index === selected}"
      >
        <p class="text-sm font-semibold text-gray-900">
          {{ recipe.title }}
        </p>
        <div class="flex justify-between">
          <span class="text-xs text-gray-900">@{{ recipe.Author.username }}</span>
          <span class="text-xs text-gray-600">{{ recipe.totalTime }}min</span>
        </div>
        <p class="mt-1 text-sm text-gray-600 break-words">
          <span
            v-for="(ingredient, index) in recipe.recipeIngredient"
            :key="index"
          >
            {{ Object.keys(ingredient)[0] | truncate(136) }}
          </span>
        </p>
      </div>

      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
      <div class="block px-6 pt-3 pb-4 border-t border-l-4 border-transparent hover:bg-gray-100">
        <div class="flex justify-between">
          <span class="text-sm font-semibold text-gray-900">Gloria Roberston</span>
          <span class="text-sm text-gray-600">2 days ago</span>
        </div>
        <p class="text-sm text-gray-900">
          Refund
        </p>
        <p class="mt-1 text-sm text-gray-600">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc tempus element...
        </p>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "RecipesListComponent",
    props: {
      recipes: {
        type: Array,
        default: []
      }
    },
    data() {
      return {
        selected: null
      }
    }
  }
</script>
