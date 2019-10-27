<template>
  <div class="flex items-center text-beige hover:text-gray-200">
    <span class="rounded-full h-10 w-10 flex items-center justify-center bg-beige">
      <icon-login-as-user-component v-if="login" height="h-7" width="w-7"/>
      <icon-anonymous-component v-if="anonymous" height="h-7" width="w-7"/>
      <icon-baby-component v-if="baby" height="h-7" width="w-7"/>
      <icon-darth-vader-component v-if="darthVader"/>
      <icon-fursona-component v-if="fursona"/>
      <icon-futurama-amy-component v-if="futuramaAmy"/>
      <icon-futurama-bender-component v-if="futuramaBender"/>
      <icon-futurama-fry-component v-if="futuramaFry"/>
      <icon-futurama-hermes-component v-if="futuramaHermes"/>
      <icon-futurama-leela-component v-if="futuramaLeela"/>
      <icon-futurama-mom-component v-if="futuramaMom"/>
      <icon-futurama-nibbler-component v-if="futuramaNibbler"/>
      <icon-futurama-professor-component v-if="futuramaProfessor"/>
      <icon-futurama-zoidberg-component v-if="futuramaZoidberg"/>
      <icon-homer-simpson-component v-if="homerSimpson"/>
      <icon-human-head-component v-if="humanHead"/>
      <icon-iron-man-component v-if="ironMan"/>
      <icon-jake-component v-if="jake"/>
      <icon-mermaid-component v-if="mermaid"/>
      <icon-naruto-component v-if="naruto"/>
      <icon-pennywise-component v-if="pennywise"/>
      <icon-r2d2-component v-if="r2d2"/>
      <icon-scream-component v-if="scream"/>
      <icon-songoku-component v-if="songoku"/>
      <icon-stich-component v-if="stich"/>
      <icon-stormtrooper-component v-if="stormtrooper"/>
      <icon-super-mario-component v-if="superMario"/>
      <icon-unicorn-component v-if="unicorn"/>
      <icon-walterwhite-component v-if="walterwhite"/>
    </span>
    <p class="ml-2">{{ text }}</p>
  </div>
</template>

<script>
  import IconLoginAsUserComponent from "../icons/IconLoginAsUserComponent";
  import IconAnonymousComponent from "../icons/avatars/IconAnonymousComponent";
  import IconBabyComponent from "../icons/avatars/IconBabyComponent";
  import IconDarthVaderComponent from "../icons/avatars/IconDarthVaderComponent";
  import IconFursonaComponent from "../icons/avatars/IconFursonaComponent";
  import IconFuturamaAmyComponent from "../icons/avatars/IconFuturamaAmyComponent";
  import IconFuturamaBenderComponent from "../icons/avatars/IconFuturamaBenderComponent";
  import IconFuturamaFryComponent from "../icons/avatars/IconFuturamaFryComponent";
  import IconFuturamaHermesComponent from "../icons/avatars/IconFuturamaHermesComponent";
  import IconFuturamaLeelaComponent from "../icons/avatars/IconFuturamaLeelaComponent";
  import IconFuturamaMomComponent from "../icons/avatars/IconFuturamaMomComponent";
  import IconFuturamaNibblerComponent from "../icons/avatars/IconFuturamaNibblerComponent";
  import IconFuturamaProfessorComponent from "../icons/avatars/IconFuturamaProfessorComponent";
  import IconFuturamaZoidbergComponent from "../icons/avatars/IconFuturamaZoidbergComponent";
  import IconHomerSimpsonComponent from "../icons/avatars/IconHomerSimpsonComponent";
  import IconHumanHeadComponent from "../icons/avatars/IconHumanHeadComponent";
  import IconIronManComponent from "../icons/avatars/IconIronManComponent";
  import IconJakeComponent from "../icons/avatars/IconJakeComponent";
  import IconMermaidComponent from "../icons/avatars/IconMermaidComponent";
  import IconNarutoComponent from "../icons/avatars/IconNarutoComponent";
  import IconPennywiseComponent from "../icons/avatars/IconPennywiseComponent";
  import IconR2d2Component from "../icons/avatars/IconR2d2Component";
  import IconScreamComponent from "../icons/avatars/IconScreamComponent";
  import IconSongokuComponent from "../icons/avatars/IconSongokuComponent";
  import IconStichComponent from "../icons/avatars/IconStichComponent";
  import IconStormtrooperComponent from "../icons/avatars/IconStormtrooperComponent";
  import IconSuperMarioComponent from "../icons/avatars/IconSuperMarioComponent";
  import IconUnicornComponent from "../icons/avatars/IconUnicornComponent";
  import IconWalterwhiteComponent from "../icons/avatars/IconWalterwhiteComponent";
  export default {
    name: "Badge",
    components: {
      IconAnonymousComponent,
      IconBabyComponent,
      IconDarthVaderComponent,
      IconFursonaComponent,
      IconFuturamaAmyComponent,
      IconFuturamaBenderComponent,
      IconFuturamaFryComponent,
      IconLoginAsUserComponent,
      IconFuturamaHermesComponent,
      IconFuturamaLeelaComponent,
      IconFuturamaMomComponent,
      IconFuturamaNibblerComponent,
      IconFuturamaProfessorComponent,
      IconFuturamaZoidbergComponent,
      IconHomerSimpsonComponent,
      IconHumanHeadComponent,
      IconIronManComponent,
      IconJakeComponent,
      IconMermaidComponent,
      IconNarutoComponent,
      IconPennywiseComponent,
      IconR2d2Component,
      IconScreamComponent,
      IconSongokuComponent,
      IconStichComponent,
      IconStormtrooperComponent,
      IconSuperMarioComponent,
      IconUnicornComponent,
      IconWalterwhiteComponent
    },
    props: {
      text: {
        type: String,
        required: true
      },
      login: {
        type: Boolean,
        default: false
      },
      anonymous: {
        type: Boolean,
        default: false
      },
      baby: {
        type: Boolean,
        default: false
      },
      darthVader: {
        type: Boolean,
        default: false
      },
      fursona: {
        type: Boolean,
        default: false
      },
      futuramaAmy: {
        type: Boolean,
        default: false
      },
      futuramaBender: {
        type: Boolean,
        default: false
      },
      futuramaFry: {
        type: Boolean,
        default: false
      },
      futuramaHermes: {
        type: Boolean,
        default: false
      },
      futuramaLeela: {
        type: Boolean,
        default: false
      },
      futuramaMom: {
        type: Boolean,
        default: false
      },
      futuramaNibbler: {
        type: Boolean,
        default: false
      },
      futuramaProfessor: {
        type: Boolean,
        default: false
      },
      futuramaZoidberg: {
        type: Boolean,
        default: false
      },
      homerSimpson: {
        type: Boolean,
        default: false
      },
      humanHead: {
        type: Boolean,
        default: false
      },
      ironMan: {
        type: Boolean,
        default: false
      },
      jake: {
        type: Boolean,
        default: false
      },
      mermaid: {
        type: Boolean,
        default: false
      },
      naruto: {
        type: Boolean,
        default: false
      },
      pennywise: {
        type: Boolean,
        default: false
      },
      r2d2: {
        type: Boolean,
        default: false
      },
      scream: {
        type: Boolean,
        default: false
      },
      songoku: {
        type: Boolean,
        default: false
      },
      stich: {
        type: Boolean,
        default: false
      },
      stormtrooper: {
        type: Boolean,
        default: false
      },
      superMario: {
        type: Boolean,
        default: false
      },
      unicorn: {
        type: Boolean,
        default: false
      },
      walterwhite: {
        type: Boolean,
        default: false
      }
    }
  }
</script>

<style scoped>

</style>
