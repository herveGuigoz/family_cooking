<template>
  <div id="sidebar" class="p-6 flex flex-no-wrap flex-col h-screen bg-brown">
    <div class="flex flex-col items-center">
      <nuxt-link to="/">
        <h1 class="brand font-semibold text-center uppercase">Family cooking</h1>
      </nuxt-link>
      <p class="text-grey text-xs pt-3">
        Ajoutez vos propres recettes, sauvegardez vos préférées et commentez vos coups de
        coeur...
      </p>
    </div>
    <div class="flex flex-col my-10">
      <p class="label text-xs tracking-widest uppercase text-grey">Les Recettes</p>
      <ul class>
        <li class="my-2">
          <menu-button text="Rechercher" link="/">
            <icon-search/>
          </menu-button>
        </li>
        <li class="my-2">
          <menu-button text="Favoris" link="/">
            <icon-in-love/>
          </menu-button>
        </li>
      </ul>
      <p class="label text-xs tracking-widest uppercase text-grey pt-3">Mes Recettes</p>
      <ul class>
        <li class="my-2">
          <menu-button text="Poster" link="/new">
            <icon-toast/>
          </menu-button>
        </li>
        <li class="my-2">
          <menu-button text="Modifier" link="/">
            <icon-edit-file/>
          </menu-button>
        </li>
      </ul>
    </div>
    <div class="flex flex-col items-center justify-end h-full">
      <div v-if="!authenticated">
        <menu-button text="Login" link="/login">
          <icon-login-as-user/>
        </menu-button>
      </div>
    </div>
  </div>
</template>

<script>
  import MenuButton from '~/components/menu/MenuButton.vue'
  import IconSearch from "../icons/IconSearch";
  import IconInLove from "../icons/IconInLove";
  import IconToast from "../icons/IconToast";
  import IconEditFile from "../icons/IconEditFile";
  import IconLoginAsUser from "../icons/IconLoginAsUser";
  //import { mapGetters } from "vuex";
  export default {
    components: {
      MenuButton,
      IconSearch,
      IconInLove,
      IconToast,
      IconEditFile,
      IconLoginAsUser
    }
  //  computed: {
  //    ...mapGetters({
  //      authenticated: "getAuthenticated"
  //    })
  //  }
  }
</script>

<style scoped>
  .brand {
    line-height: 1.125;
    word-break: break-word;
    color: rgb(0, 209, 178);
  }
  .label {
    font-family: "Avenir-Light", sans-serif;
  }
</style>
