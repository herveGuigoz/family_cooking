<template>
  <div
    class="w-6 h-6 flex items-center justify-center uppercase text-white font-medium shadow"
    :class="badgeClasses"
  >
    <component
      v-if="avatar"
      :is="avatar"
      :class="avatarClasses"
      v-bind="$attrs"
      v-on="$listeners"
    />
    <span v-else>
      <slot>{{avatarText}}</slot>
    </span>
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
    inheritAttrs: false,
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
      name: {
        type: String,
        default: ""
      },
      avatar: {
        type: String,
        default: null
      },
      color: {
        type: String,
        default: "beige"
      },
      size: {
        type: String,
        default: "sm" //sm, md, lg
      },
      round: {
        type: Boolean,
        default: true
      }
    },
    computed: {
      badgeSizeClasses() {
        const sizeMappings = {
            sm: `h-12 w-12`,
            md: `h-16 w-16 text-xl`,
            lg: `text-lg h-24 w-24 text-2xl`
        };
        return sizeMappings[this.size];
      },
      avatarSizeClasses() {
        const sizeMappings = {
          sm: `h-8 w-8`,
          md: `h-10 w-10`,
          lg: `h-16 w-16`
        };
        return sizeMappings[this.size];
      },
      badgeClasses() {
        return `bg-${this.color}${this.color === 'transparent' ? '' : '-500'} ${this.round ? 'rounded-full' : 'rounded'} ${this.badgeSizeClasses}`;
      },
      avatarClasses () {
        return `${this.avatarSizeClasses} overflow-hidden`;
      },
      avatarText() {
        if (!this.name || typeof this.name !== "string" || !this.name.length) {
          return "";
        }
        return this.name.charAt(0);
      }
    }
  };
</script>
