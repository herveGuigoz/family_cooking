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
            <icon-search-component/>
          </ui-button-component>
        </li>
        <li class="my-2">
          <ui-button-component text="Favoris" link="/">
            <icon-in-love-component/>
          </ui-button-component>
        </li>
      </ul>
      <p class="label text-xs tracking-widest uppercase text-grey pt-3">Mes Recettes</p>
      <ul class>
        <li class="my-2">
          <ui-button-component text="Poster" link="/new">
            <icon-toast-component/>
          </ui-button-component>
        </li>
        <li class="my-2">
          <ui-button-component text="Modifier" link="/">
            <icon-edit-file-component/>
          </ui-button-component>
        </li>
      </ul>
    </div>
    <div class="flex flex-col items-center justify-end h-full">
      <div v-if="!authenticated">
        <ui-button-component text="Login" link="/login">
          <icon-login-as-user-component/>
        </ui-button-component>
      </div>
    </div>
  </div>
</template>

<script>
  import UiButtonComponent from "../UI/UiButtonComponent";
  import IconSearchComponent from "../icons/IconSearchComponent";
  import IconInLoveComponent from "../icons/IconInLoveComponent";
  import IconToastComponent from "../icons/IconToastComponent";
  import IconEditFileComponent from "../icons/IconEditFileComponent";
  import IconLoginAsUserComponent from "../icons/IconLoginAsUserComponent";
  //import { mapGetters } from "vuex";
  export default {
    components: {
      UiButtonComponent,
      IconSearchComponent,
      IconInLoveComponent,
      IconToastComponent,
      IconEditFileComponent,
      IconLoginAsUserComponent
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
