<template>
  <div class="flex items-center text-beige hover:text-gray-200">
    <span class="rounded-full h-10 w-10 flex items-center justify-center bg-beige">
      <icon-user-component v-if="user" height="h-7" width="w-7"/>
      <icon-anonymous-component v-if="anonymous" height="h-7" width="w-7"/>
      <icon-baby-component v-if="baby" height="h-7" width="w-7"/>
      <icon-darth-vader-component v-if="darthVader" height="h-7" width="w-7"/>
      <icon-futurama-amy-component v-if="futuramaAmy" height="h-7" width="w-7"/>
      <icon-futurama-bender-component v-if="futuramaBender" height="h-7" width="w-7"/>
      <icon-futurama-fry-component v-if="futuramaFry" height="h-7" width="w-7"/>
      <icon-futurama-hermes-component v-if="futuramaHermes" height="h-7" width="w-7"/>
      <icon-futurama-leela-component v-if="futuramaLeela" height="h-7" width="w-7"/>
      <icon-futurama-mom-component v-if="futuramaMom" height="h-7" width="w-7"/>
      <icon-futurama-nibbler-component v-if="futuramaNibbler" height="h-7" width="w-7"/>
      <icon-futurama-professor-component v-if="futuramaProfessor" height="h-7" width="w-7"/>
      <icon-futurama-zoidberg-component v-if="futuramaZoidberg" height="h-7" width="w-7"/>
      <icon-homer-simpson-component v-if="homerSimpson" height="h-7" width="w-7"/>
      <icon-iron-man-component v-if="ironMan" height="h-7" width="w-7"/>
      <icon-mermaid-component v-if="mermaid" height="h-7" width="w-7"/>
      <icon-naruto-component v-if="naruto" height="h-7" width="w-7"/>
      <icon-pennywise-component v-if="pennywise" height="h-7" width="w-7"/>
      <icon-r2d2-component v-if="r2d2" height="h-7" width="w-7"/>
      <icon-songoku-component v-if="songoku" height="h-7" width="w-7"/>
      <icon-stich-component v-if="stich" height="h-7" width="w-7"/>
      <icon-stormtrooper-component v-if="stormtrooper" height="h-7" width="w-7"/>
      <icon-super-mario-component v-if="superMario" height="h-7" width="w-7"/>
      <icon-unicorn-component v-if="unicorn" height="h-7" width="w-7"/>
      <icon-walterwhite-component v-if="walterwhite" height="h-7" width="w-7"/>
    </span>
    <p class="ml-2">{{ text }}</p>
  </div>
</template>

<script>
  import IconUserComponent from "~/components/icons/avatars/IconUserComponent";
  import IconAnonymousComponent from "~/components/icons/avatars/IconAnonymousComponent";
  import IconBabyComponent from "~/components/icons/avatars/IconBabyComponent";
  import IconDarthVaderComponent from "~/components/icons/avatars/IconDarthVaderComponent";
  import IconFuturamaAmyComponent from "~/components/icons/avatars/IconFuturamaAmyComponent";
  import IconFuturamaBenderComponent from "~/components/icons/avatars/IconFuturamaBenderComponent";
  import IconFuturamaFryComponent from "~/components/icons/avatars/IconFuturamaFryComponent";
  import IconFuturamaHermesComponent from "~/components/icons/avatars/IconFuturamaHermesComponent";
  import IconFuturamaLeelaComponent from "~/components/icons/avatars/IconFuturamaLeelaComponent";
  import IconFuturamaMomComponent from "~/components/icons/avatars/IconFuturamaMomComponent";
  import IconFuturamaNibblerComponent from "~/components/icons/avatars/IconFuturamaNibblerComponent";
  import IconFuturamaProfessorComponent from "~/components/icons/avatars/IconFuturamaProfessorComponent";
  import IconFuturamaZoidbergComponent from "~/components/icons/avatars/IconFuturamaZoidbergComponent";
  import IconHomerSimpsonComponent from "~/components/icons/avatars/IconHomerSimpsonComponent";
  import IconIronManComponent from "~/components/icons/avatars/IconIronManComponent";
  import IconMermaidComponent from "~/components/icons/avatars/IconMermaidComponent";
  import IconNarutoComponent from "~/components/icons/avatars/IconNarutoComponent";
  import IconPennywiseComponent from "~/components/icons/avatars/IconPennywiseComponent";
  import IconR2d2Component from "~/components/icons/avatars/IconR2d2Component";
  import IconSongokuComponent from "~/components/icons/avatars/IconSongokuComponent";
  import IconStichComponent from "~/components/icons/avatars/IconStichComponent";
  import IconStormtrooperComponent from "~/components/icons/avatars/IconStormtrooperComponent";
  import IconSuperMarioComponent from "~/components/icons/avatars/IconSuperMarioComponent";
  import IconUnicornComponent from "~/components/icons/avatars/IconUnicornComponent";
  import IconWalterwhiteComponent from "~/components/icons/avatars/IconWalterwhiteComponent";
  export default {
    name: "Badge",
    components: {
      IconAnonymousComponent,
      IconBabyComponent,
      IconDarthVaderComponent,
      IconFuturamaAmyComponent,
      IconFuturamaBenderComponent,
      IconFuturamaFryComponent,
      IconUserComponent,
      IconFuturamaHermesComponent,
      IconFuturamaLeelaComponent,
      IconFuturamaMomComponent,
      IconFuturamaNibblerComponent,
      IconFuturamaProfessorComponent,
      IconFuturamaZoidbergComponent,
      IconHomerSimpsonComponent,
      IconIronManComponent,
      IconMermaidComponent,
      IconNarutoComponent,
      IconPennywiseComponent,
      IconR2d2Component,
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
      user: {
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
      ironMan: {
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
