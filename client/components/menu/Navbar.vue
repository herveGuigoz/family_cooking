<template>
  <header class="bg-gray-900 sm:flex sm:justify-around sm:items-center sm:px-4 sm:py-3">
    <div class="flex items-center justify-between px-4 py-3 sm:p-0 sm:hidden">
      <p class="brand font-semibold text-center uppercase">
        Family<span class="text-gray-800"> cooking</span>
      </p>
      <button type="button" class="block text-teal-500 hover:text-gray-500 focus:text-white focus:outline-none" @click="isOpen = !isOpen">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
          <path v-if="isOpen" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
          <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
        </svg>
      </button>
    </div>
    <nav :class="isOpen ? 'block' : 'hidden'" class="px-2 pt-2 pb-4 sm:flex sm:p-0">
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">
        <icon-search-component />
        <a href="#" class="px-2">Rechercher</a>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">
        <icon-in-love-component />
        <a href="#" class="px-2">Favoris</a>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">
        <icon-toast-component />
        <a href="#" class="px-2">Poster</a>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">
        <icon-edit-file-component />
        <a href="#" class="px-2">Modifier</a>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800">
        <nuxt-link :to="isAuthenticated ? '/profile/edit' : '/login'">
          <badge
            :user="user"
            background-color="bg-transparent"
            background-height="h-6"
            background-width="w-6"
            icon-width="w-6"
            icon-height="h-6"
          />
        </nuxt-link>
      </div>
    </nav>
  </header>
</template>

<script>
import { mapGetters } from 'vuex'
import IconSearchComponent from '../icons/IconSearchComponent'
import IconInLoveComponent from '../icons/IconInLoveComponent'
import IconToastComponent from '../icons/IconToastComponent'
import IconEditFileComponent from '../icons/IconEditFileComponent'
import Badge from '../UI/Badge'
export default {
  name: 'Navbar',
  components: { IconSearchComponent, IconInLoveComponent, IconToastComponent, IconEditFileComponent, Badge },
  data () {
    return {
      isOpen: false
    }
  },
  computed: {
    ...mapGetters({
      isAuthenticated: 'isAuth',
      user: 'getUser'
    })
  }
}
</script>

<style scoped>
  .brand {
    line-height: 1.125;
    word-break: break-word;
    color: rgb(0, 209, 178);
  }
</style>
