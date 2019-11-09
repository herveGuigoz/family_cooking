<template>
  <div class="flex items-center text-beige-500 hover:text-gray-200">
    <span
      class="rounded-full flex items-center justify-center"
      :class="[backgroundColor, backgroundHeight, backgroundWidth]"
    >
      <component :is="currentAvatar" :height="iconHeight" :width="iconWidth" />
    </span>
    <p class="ml-2">
      {{ user.username ? user.username : 'Login' }}
    </p>
  </div>
</template>

<script>
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
  name: 'Badge',
  components: {
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
  props: {
    user: {
      type: Object,
      default: null
    },
    backgroundColor: {
      type: String,
      default: 'bg-grey'
    },
    backgroundHeight: {
      type: String,
      default: 'h-10'
    },
    backgroundWidth: {
      type: String,
      default: 'w-10'
    },
    iconHeight: {
      type: String,
      default: 'h-8'
    },
    iconWidth: {
      type: String,
      default: 'w-8'
    }
  },
  computed: {
    currentAvatar () {
      return this.user.avatar ? this.user.avatar : 'anonymous'
    }
  }
}
</script>

<style scoped>

</style>
