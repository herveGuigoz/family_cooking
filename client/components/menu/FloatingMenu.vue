<template>
  <div class="h-64 flex flex-col justify-end">
    <div v-if="menuIsVisible">
      <transition-group name=”fade”>
        <div v-for="(item, index) in childButtons" :key="index" class="my-2 p-3 flex justify-center items-center border border-teal-500 rounded-lg">
          {{ item.icon }}
        </div>
      </transition-group>
    </div>
    <button
      @click="handleClick"
      class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    >
      Click
    </button>
  </div>
</template>

<script>
  export default {
    name: "FloatingMenu",
    data: () => ({
      menuIsVisible: false,
      childButtons: [
        {
          text: 'Example Link!',
          link: 'https://some.link',
          icon: require('~/assets/icons/edit.svg')
        },
        {
          text: 'Example Link 2!',
          link: 'https://another.link',
          icon: require('~/assets/icons/edit.svg')
        },
        {
          text: 'Example Link!',
          link: 'https://some.link',
          icon: require('~/assets/icons/edit.svg')
        }
      ]
    }),
    methods: {
      handleClick () {
        this.menuIsVisible = !this.menuIsVisible
      }
    }
  }
</script>

<style scoped>
  .fade-enter-active, .fade-leave-active {
    transition: all .2s;
  }
  .fade-enter, .fade-leave-to{
    opacity: 0;
  }
  .fade-enter-active {
    transition-delay: .2s;
  }
</style>
