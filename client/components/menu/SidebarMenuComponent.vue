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
          <ui-button-component text="Rechercher" link="/">
            <icon-search/>
          </ui-button-component>
        </li>
        <li class="my-2">
          <ui-button-component text="Favoris" link="/">
            <icon-in-love/>
          </ui-button-component>
        </li>
      </ul>
      <p class="label text-xs tracking-widest uppercase text-grey pt-3">Mes Recettes</p>
      <ul class>
        <li class="my-2">
          <ui-button-component text="Poster" link="/new">
            <icon-toast/>
          </ui-button-component>
        </li>
        <li class="my-2">
          <ui-button-component text="Modifier" link="/">
            <icon-edit-file/>
          </ui-button-component>
        </li>
      </ul>
    </div>
    <div class="flex flex-col items-center justify-end h-full">
      <div v-if="!authenticated">
        <ui-button-component text="Login" link="/login">
          <icon-login-as-user/>
        </ui-button-component>
      </div>
    </div>
  </div>
</template>

<script>
  import UiButtonComponent from "../UI/UiButtonComponent";
  import IconSearch from "../icons/IconSearch";
  import IconInLove from "../icons/IconInLove";
  import IconToast from "../icons/IconToast";
  import IconEditFile from "../icons/IconEditFile";
  import IconLoginAsUser from "../icons/IconLoginAsUser";
  //import { mapGetters } from "vuex";
  export default {
    components: {
      UiButtonComponent,
      IconSearch,
      IconInLove,
      IconToast,
      IconEditFile,
      IconLoginAsUser
    },
    data: () => ({
      authenticated: false // TODO : a supprimer
    })
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
