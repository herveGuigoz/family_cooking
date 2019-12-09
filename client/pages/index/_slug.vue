<template>
  <div class="flex-1 flex flex-col h-screen text-brown">
    <div class="relative">
      <div class="flex items-center justify-between px-5 py-4 border-b h-16">
        <div class="flex items-center">
          <button @click="quit">
            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#e0678f" d="M32 3A29 29 0 1 0 32 61A29 29 0 1 0 32 3Z"/><path fill="#ed7899" d="M32 8A24 24 0 1 0 32 56A24 24 0 1 0 32 8Z"/><path fill="#fff" d="M42.849,16.908L32,27.757L21.151,16.908c-0.391-0.391-1.024-0.391-1.414,0l-2.828,2.828 c-0.391,0.391-0.391,1.024,0,1.414L27.757,32L16.908,42.849c-0.391,0.391-0.391,1.024,0,1.414l2.828,2.828 c0.391,0.391,1.024,0.391,1.414,0L32,36.243l10.849,10.849c0.391,0.391,1.024,0.391,1.414,0l2.828-2.828 c0.391-0.391,0.391-1.024,0-1.414L36.243,32l10.849-10.849c0.391-0.391,0.391-1.024,0-1.414l-2.828-2.828 C43.873,16.518,43.24,16.518,42.849,16.908z"/><path fill="#faefde" d="M47.713 43.471L36.243 32 32 27.757 20.529 16.287 16.287 20.529 27.757 32 16.287 43.471 20.529 47.713 32 36.243 43.471 47.713z"/><path fill="#fff7f0" d="M47.506,20.737L43.3,16.457l-11.18,11.42L21.237,16.994c-1.172,1.172-1.172,3.071,0,4.243 l21.527,21.527c1.172,1.172,3.071,1.172,4.243,0L36.123,31.88L47.506,20.737z"/><path fill="#8d6c9f" d="M32,2C15.458,2,2,15.458,2,32s13.458,30,30,30s30-13.458,30-30S48.542,2,32,2z M32,60 C16.561,60,4,47.439,4,32S16.561,4,32,4s28,12.561,28,28S47.439,60,32,60z"/><path fill="#8d6c9f" d="M37.657,32l10.142-10.142c0.78-0.78,0.78-2.049,0-2.829l-2.828-2.828 c-0.78-0.781-2.05-0.781-2.829,0L32,26.343L21.858,16.201c-0.778-0.78-2.048-0.78-2.829,0l-2.828,2.828 c-0.78,0.78-0.78,2.049,0,2.829L26.343,32L16.201,42.142c-0.78,0.78-0.78,2.049,0,2.829l2.828,2.828 c0.779,0.78,2.049,0.779,2.829,0L32,37.657l10.142,10.142c0.39,0.39,0.902,0.585,1.415,0.585c0.512,0,1.024-0.195,1.414-0.585 l2.828-2.828c0.78-0.78,0.78-2.049,0-2.829L37.657,32z M43.556,46.385L32,34.829L20.443,46.385l-2.828-2.829L29.171,32 L17.615,20.443l2.829-2.828L32,29.171l11.556-11.556l2.829,2.829L34.829,32l11.556,11.557L43.556,46.385z"/><path fill="#8d6c9f" d="M41.899 30.586c-.391.391-.391 1.024 0 1.414l1.415 1.414c.195.195.451.293.707.293s.512-.098.707-.293c.391-.391.391-1.024 0-1.414l-1.415-1.414C42.923 30.195 42.289 30.195 41.899 30.586zM46.849 27.05c-.391-.391-1.023-.391-1.414 0s-.391 1.023 0 1.414l1.414 1.414c.195.195.451.293.707.293s.512-.098.707-.293c.391-.391.391-1.023 0-1.414L46.849 27.05zM51.799 24.929l-1.414-1.415c-.391-.391-1.023-.391-1.414 0-.391.39-.391 1.023 0 1.414l1.414 1.415c.195.195.451.293.707.293s.512-.098.707-.293C52.189 25.953 52.189 25.32 51.799 24.929zM13.615 37.657c-.391-.391-1.023-.391-1.414 0-.391.39-.391 1.023 0 1.414l1.414 1.415c.195.195.451.293.707.293s.512-.098.707-.293c.391-.39.391-1.023 0-1.414L13.615 37.657zM17.151 36.95c.195.195.451.293.707.293s.512-.098.707-.293c.391-.391.391-1.023 0-1.414l-1.414-1.414c-.391-.391-1.023-.391-1.414 0s-.391 1.023 0 1.414L17.151 36.95zM21.394 33.707c.256 0 .512-.098.707-.293.391-.391.391-1.024 0-1.414l-1.415-1.414c-.391-.391-1.024-.391-1.414 0-.391.391-.391 1.024 0 1.414l1.415 1.414C20.882 33.609 21.138 33.707 21.394 33.707z"/></svg>
          </button>
          <button v-if="isBookmarkAvailable" class="ml-6" @click="handleBookmarkAction">
            <bookmark-icon-component :is-bookmarked="isBookmarked" height="h-7" width="w-7"/>
          </button>
          <button class="ml-6">
            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g id="_x33_8_Printer_Print_Paper_Photo_Ink_Color_Polygraphy"><path fill="#c2cde7" d="M58,45H6c-1.7,0-3-1.3-3-3V18c0-1.7,1.3-3,3-3h52c1.7,0,3,1.3,3,3v24C61,43.7,59.7,45,58,45z"/><path fill="#acb7d0" d="M58,45H6c-1.7,0-3-1.3-3-3v-6c0-1.7,1.3-3,3-3h52c1.7,0,3,1.3,3,3v6C61,43.7,59.7,45,58,45z"/><path fill="#bbdef9" d="M41.8,59H16c-1.7,0-3-1.3-3-3V39h38v10.8c0,0.8-0.3,1.6-0.9,2.1l-6.2,6.2C43.3,58.7,42.6,59,41.8,59z"/><path fill="#def0ff" d="M50 52.1L50 39.6 35 58.6 43 58.6zM20.6 58.6L36.2 38.9 34.7 38.9 19.1 58.6zM29.6 58.6L45.2 38.9 40.7 38.9 25.1 58.6z"/><path fill="#fff" d="M20 47.2L21.2 49.5 23.5 50.7 21.2 52 20 54.2 18.8 52 16.5 50.7 18.8 49.5zM30.7 42L31.5 43.6 33.1 44.4 31.5 45.3 30.7 46.8 29.8 45.3 28.2 44.4 29.8 43.6zM38.5 48.8L39.1 49.8 40.2 50.4 39.1 51 38.5 52.1 38 51 36.9 50.4 38 49.8z"/><path fill="#ffefb8" d="M43 59L43 51 51 51zM55 25H61V33H55z"/><path fill="#faefde" d="M49 15L15 15 18 5 46 5z"/><path fill="#dce5f5" d="M56,20L56,20c0,0.6-0.4,1-1,1H17c-0.6,0-1-0.4-1-1v0c0-0.6,0.4-1,1-1h38C55.6,19,56,19.4,56,20z"/><path fill="#f75f83" d="M7 19H11V22H7z"/><path fill="#8d6c9f" d="M12 21v-1c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v1c0 1.1.9 2 2 2h2C11.1 23 12 22.1 12 21zM10 21H8v-1h2V21zM6 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1 .6 0 1-.4 1-1v-2C7 27.4 6.6 27 6 27zM11 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1 .6 0 1-.4 1-1v-2C12 27.4 11.6 27 11 27zM16 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1 .6 0 1-.4 1-1v-2C17 27.4 16.6 27 16 27zM21 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1 .6 0 1-.4 1-1v-2C22 27.4 21.6 27 21 27zM26 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1 .6 0 1-.4 1-1v-2C27 27.4 26.6 27 26 27zM31 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1 .6 0 1-.4 1-1v-2C32 27.4 31.6 27 31 27zM36 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1 .6 0 1-.4 1-1v-2C37 27.4 36.6 27 36 27zM41 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1s1-.4 1-1v-2C42 27.4 41.6 27 41 27zM51 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1s1-.4 1-1v-2C52 27.4 51.6 27 51 27zM46 27c-.6 0-1 .4-1 1v2c0 .6.4 1 1 1s1-.4 1-1v-2C47 27.4 46.6 27 46 27z"/><path fill="#8d6c9f" d="M59,14h-9.2l-1.4-6.8C48,5.3,46.4,4,44.5,4H19.4c-1.9,0-3.5,1.4-3.9,3.2L14.1,14H11H5c-1.7,0-3,1.3-3,3v26 c0,0.8,0.3,1.6,0.9,2.1C3.5,45.7,4.2,46,5,46h7v11c0,0.8,0.3,1.6,0.9,2.1c0.6,0.6,1.3,0.9,2.1,0.9h27.6c0.5,0,1-0.2,1.4-0.6 l7.4-7.4c0.4-0.4,0.6-0.9,0.6-1.4V46h7c0.8,0,1.6-0.3,2.1-0.9c0.6-0.6,0.9-1.3,0.9-2.1V17C62,15.3,60.7,14,59,14z M44,56.6V52 h4.6L44,56.6z M50,50h-6c-0.5,0-1,0.2-1.4,0.6C42.2,51,42,51.5,42,52v6H15c-0.3,0-0.5-0.1-0.7-0.3C14.1,57.5,14,57.3,14,57V40h36 V50z M60.1,24h-4c-0.5,0-1,0.2-1.4,0.6c-0.4,0.4-0.6,0.9-0.6,1.4v6c0,0.5,0.2,1,0.6,1.4c0.4,0.4,0.9,0.6,1.4,0.6h4v9 c-0.1,0.3-0.2,0.5-0.4,0.7S59.3,44,59,44h-7v-4h3c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1h-4H13H9c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h3v4 H5c-0.3,0-0.5-0.1-0.7-0.3C4.1,43.5,4,43.3,4,43V17c0-0.6,0.4-1,1-1h6h4h29c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H16.2l1.3-6.4 c0.2-0.9,1-1.6,2-1.6h25.1c1,0,1.8,0.7,2,1.6l1.5,7.6c0.1,0.5,0.5,0.8,1,0.8h10c0.6,0,1,0.4,1,1V24z M60,26v6h-4v-6H60z"/></g></svg>
          </button>
        </div>
        <div class="flex items-center">
          <button v-if="$store.getters.getNextRecipeInList(this.slug)" @click="toNextRecipe">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
              <path fill="#72caaf" d="M32.04 62.12L59.04 35.12 54.8 30.88 34.92 50.76 34.92 3 28.92 3 28.92 50.76 9.04 30.88 4.79 35.12 31.8 62.12 31.92 62 32.04 62.12z"/>
              <path fill="#97e0bb" d="M9.42,26.5h42a3,3,0,0,1,3,3v0a0,0,0,0,1,0,0h-48a0,0,0,0,1,0,0v0A3,3,0,0,1,9.42,26.5Z" transform="rotate(90 30.42 28)"/>
              <path fill="#5dbc9d" d="M26.09,46.06H62.86a0,0,0,0,1,0,0v0a3,3,0,0,1-3,3H29.09a3,3,0,0,1-3-3v0a0,0,0,0,1,0,0Z" transform="rotate(135 44.479 47.56)"/>
              <path fill="#8d6c9f" d="M59.71,34.29l-4-4a1,1,0,0,0-1.41,0L36,48.59V3a1,1,0,0,0-1-1H29a1,1,0,0,0-1,1V48.59L9.71,30.29a1,1,0,0,0-1.41,0l-4,4a1,1,0,0,0,0,1.41l27,27a1,1,0,0,0,1.41,0l27-27A1,1,0,0,0,59.71,34.29ZM32,60.59,6.41,35,9,32.41,28.29,51.71A1,1,0,0,0,30,51V4h4V51a1,1,0,0,0,1.71.71L55,32.41,57.59,35Z"/>
            </svg>
          </button>
          <button v-if="$store.getters.getPreviousRecipeInList(this.slug)" class="ml-2" @click="toPreviousRecipe">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
              <path fill="#72caaf" d="M31.88 1.88L4.88 28.88 9.12 33.12 29 13.24 29 61 35 61 35 13.24 54.88 33.12 59.12 28.88 32.12 1.88 32 2 31.88 1.88z"/>
              <path fill="#5dbc9d" d="M12.5,34.5h42a3,3,0,0,1,3,3v0a0,0,0,0,1,0,0H9.5a0,0,0,0,1,0,0v0A3,3,0,0,1,12.5,34.5Z" transform="rotate(-90 33.5 36)"/>
              <path fill="#97e0bb" d="M1.05,14.94H37.82a0,0,0,0,1,0,0v0a3,3,0,0,1-3,3H4.05a3,3,0,0,1-3-3v0a0,0,0,0,1,0,0Z" transform="rotate(-45 19.439 16.438)"/>
              <path fill="#8d6c9f" d="M59.71,28.29l-27-27a1,1,0,0,0-1.41,0l-27,27a1,1,0,0,0,0,1.41l4,4a1,1,0,0,0,1.41,0L28,15.41V61a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V15.41L54.29,33.71a1,1,0,0,0,1.41,0l4-4A1,1,0,0,0,59.71,28.29ZM55,31.59,35.71,12.29A1,1,0,0,0,34,13V60H30V13a1,1,0,0,0-1.71-.71L9,31.59,6.41,29,32,3.41,57.59,29Z"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="p-3 flex-1 overflow-y-auto">
      <div class="flex items-center px-3 justify-start my-6">
        <div>
          <claps-component :total-count="totalInteractionsCount" :user-interaction-count="isUserInteractionCountAvailable" @click="sendLove"/>
        </div>
        <div>
          <h1 class="ml-6 mt-3 font-bold text-2xl">{{ title | truncate(36) }} {{ getNextSlug }}</h1>
        </div>
        <div class="ml-auto flex flex-col text-xs mt-3">
          <p>Publiée {{ publishedAt }},</p>
          <p>par @{{ author.username }}</p>
        </div>
      </div>
      <div class="flex sm:flex-col sm:items-center md:flex-row md:items-start flex-wap w-full my-12">
        <div class="md:w-1/3 flex flex-col">
          <div class="mr-3 p-3">
            <span class="text-xs font-bold text-brown">Durée</span>
            <ul class="list-disc ml-4 pt-3 text-brown">
              <li v-if="prepTime ">
                <span>Préparation :</span>
                <span id>{{ prepTime}} min</span>
              </li>
              <li v-if="cookTime">
                <span>Cuisson :</span>
                <span id>{{ cookTime }} min</span>
              </li>
            </ul>
          </div>
          <div class="mt-6 mr-3 p-3 border-t">
            <h2
              v-if="recipeIngredients.length > 0"
              class="text-xs font-bold text-brown"
            >Ingredients</h2>
            <ul class="list-disc ml-4 pt-3">
              <li
                v-for="(ingredient, index) in recipeIngredients"
                :key="index"
                class="text-brown"
              >{{ ingredient.name }}: {{ ingredient.quantity }}</li>
            </ul>
          </div>
        </div>
        <div class="w-full md:w-2/3 flex flex-col mt-6 px-6 pt-3 md:mt-0 border-l">
          <span class="text-xs font-bold text-brown mb-3">Etapes :</span>
          <div v-for="(step, index) in recipeInstructions" :key="index" class="my-3 flex">
            <p class="font-bold text-verve">{{ index + 1 }}.</p>
            <p class="ml-2">{{ step }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import BookmarkIconComponent from "../../components/Recipes/BookmarkIconComponent";
  import ClapsComponent from "../../components/Recipes/ClapsComponent";
  export default {
    components: { BookmarkIconComponent, ClapsComponent },
    validate ({ params }) {
      return /[\w|-]*/.test(params.id) // TODO Une meilleure regex
    },
    head () {
      return {
        title: this.title,
      }
    },
    asyncData ({ params, store, error }) {
      const recipe = store.state.list.find(recipe => recipe.slug === params.slug)
      if (!recipe) {
        return error({ message: 'Recipe not found', statusCode: 404 })
      }
      return recipe
    },
    created() {
      this.$store.commit('SET_SELECTED', this.slug)
    },
    computed: {
      isBookmarkAvailable () {
        return this.hasOwnProperty('isBookmarked')
      },
      isUserInteractionCountAvailable () {
        return this.hasOwnProperty('userInteractionCount') ? this.userInteractionCount : 0
      }
    },
    methods: {
      async sendLove () {
        try {
          await this.$store.dispatch('handleSendLoveAction', this.userInteractionCount)
        } catch (e) {
          console.log(e)
        }
      },
      toPreviousRecipe () {
        this.$router.push('/' + this.$store.getters.getPreviousRecipeInList(this.slug))
      },
      toNextRecipe () {
        this.$router.push('/' + this.$store.getters.getNextRecipeInList(this.slug))
      },
      quit () {
        this.$router.push('/')
      },
      async handleBookmarkAction () {
        try {
          await this.$store.dispatch('handleBookmarkAction', this.slug)
          this.isBookmarked = !this.isBookmarked
        } catch (e) {
          console.log(e)
        }
      }
    },
    beforeDestroy () {
      this.$store.commit('REMOVE_SELECTED')
    }
  }
</script>

<style scoped>

</style>
