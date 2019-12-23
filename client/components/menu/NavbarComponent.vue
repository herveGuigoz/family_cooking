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
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 cursor-pointer" @click="redirect('/')">
        <icon-search-component />
        <span class="px-2">Rechercher</span>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 cursor-pointer" @click="redirect('/')">
        <icon-in-love-component />
        <a href="#" class="px-2">Favoris</a>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 cursor-pointer" @click="redirect('/')">
        <icon-toast-component />
        <a href="#" class="px-2">Poster</a>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 cursor-pointer" @click="redirect('/')">
        <icon-edit-file-component />
        <a href="#" class="px-2">Modifier</a>
      </div>
      <div class="block flex flex-nowrap items-center px-2 py-1 text-white font-semibold rounded hover:bg-gray-800 cursor-pointer" @click="redirect('/profile/edit')">
        <component :is="auth.user.avatar || 'anonymous'" />
        <a href="#" class="px-2">Profile</a>
      </div>
    </nav>
  </header>
</template>

<script>
import { mapState } from 'vuex'
import IconSearchComponent from '../icons/IconSearchComponent'
import IconInLoveComponent from '../icons/IconInLoveComponent'
import IconToastComponent from '../icons/IconToastComponent'
import IconEditFileComponent from '../icons/IconEditFileComponent'
import futuramazapp from '../icons/avatars/futuramazapp'
import moustache from '~/components/icons/avatars/moustache'
import anonymous from '~/components/icons/avatars/anonymous'
import baby from '~/components/icons/avatars/baby'
import darthvader from '~/components/icons/avatars/darthvader'
import futuramaamy from '~/components/icons/avatars/futuramaamy'
import futuramabender from '~/components/icons/avatars/futuramabender'
import futuramafry from '~/components/icons/avatars/futuramafry'
import futuramahermes from '~/components/icons/avatars/futuramahermes'
import futuramaleela from '~/components/icons/avatars/futuramaleela'
import futuramamom from '~/components/icons/avatars/futuramamom'
import futuramanibbler from '~/components/icons/avatars/futuramanibbler'
import futuramaprofessor from '~/components/icons/avatars/futuramaprofessor'
import futuramazoidberg from '~/components/icons/avatars/futuramazoidberg'
import homersimpson from '~/components/icons/avatars/homersimpson'
import ironman from '~/components/icons/avatars/ironman'
import mermaid from '~/components/icons/avatars/mermaid'
import pennywise from '~/components/icons/avatars/pennywise'
import r2d2 from '~/components/icons/avatars/r2d2'
import songoku from '~/components/icons/avatars/songoku'
import stich from '~/components/icons/avatars/stich'
import stormtrooper from '~/components/icons/avatars/stormtrooper'
import supermario from '~/components/icons/avatars/supermario'
import unicorn from '~/components/icons/avatars/unicorn'
import walterwhite from '~/components/icons/avatars/walterwhite'
export default {
  name: 'NavbarComponent',
  components: {
    IconSearchComponent,
    IconInLoveComponent,
    IconToastComponent,
    IconEditFileComponent,
    moustache,
    anonymous,
    baby,
    darthvader,
    futuramaamy,
    futuramabender,
    futuramafry,
    futuramahermes,
    futuramaleela,
    futuramamom,
    futuramanibbler,
    futuramaprofessor,
    futuramazoidberg,
    futuramazapp,
    homersimpson,
    ironman,
    mermaid,
    pennywise,
    r2d2,
    songoku,
    stich,
    stormtrooper,
    supermario,
    unicorn,
    walterwhite
  },
  data () {
    return {
      isOpen: false
    }
  },
  computed: {
    ...mapState(['auth'])
  },
  methods: {
    redirect (link) {
      this.isOpen = false
      this.$router.push(link)
    }
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
