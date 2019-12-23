<template>
  <div class="flex flex-col justify-between h-screen bg-brown">
    <div class="p-6 flex flex-no-wrap flex-col">
      <div class="flex flex-col items-center">
        <nuxt-link to="/">
          <h1 class="brand font-semibold text-center uppercase">
            Family <span class="text-beige"> cooking</span>
          </h1>
        </nuxt-link>
        <p class="block pt-3 text-grey text-xs">
          Ajoutez vos propres recettes, sauvegardez vos préférées et commentez vos coups de
          coeur...
        </p>
      </div>
      <div class="flex flex-col my-10">
        <p class="label block text-xs tracking-widest uppercase text-grey">
          Les Recettes
        </p>
        <div>
          <ui-button-component text="Rechercher" link="/">
            <icon-search-component />
          </ui-button-component>
          <ui-button-component text="Favoris" link="/">
            <icon-in-love-component />
          </ui-button-component>
        </div>
        <p class="label block text-xs tracking-widest uppercase text-grey pt-3">
          Mes Recettes
        </p>
        <div>
          <ui-button-component text="Poster" link="/new">
            <icon-toast-component />
          </ui-button-component>
          <ui-button-component text="Modifier" link="/">
            <icon-edit-file-component width="w-6" height="h-6" />
          </ui-button-component>
        </div>
      </div>
    </div>
    <div class="flex-shrink-0 flex justify-center py-3">
      <nuxt-link :to="auth.token ? '/profile/edit' : '/auth/login'" class="flex items-center w-full px-4">
        <base-avatar :avatar="auth.user.avatar || 'anonymous'" class="mx-2" />
        <span class="ml-1 text-beige-500 label tracking-wide">{{ auth.user.username || 'Login' }}</span>
      </nuxt-link>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import BaseAvatar from '../UI/BaseAvatar'
import UiButtonComponent from '../UI/UiButtonComponent'
import IconSearchComponent from '../icons/IconSearchComponent'
import IconInLoveComponent from '../icons/IconInLoveComponent'
import IconToastComponent from '../icons/IconToastComponent'
import IconEditFileComponent from '../icons/IconEditFileComponent'
export default {
  components: {
    BaseAvatar,
    UiButtonComponent,
    IconSearchComponent,
    IconInLoveComponent,
    IconToastComponent,
    IconEditFileComponent
  },
  computed: {
    ...mapState(['auth'])
  }
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
