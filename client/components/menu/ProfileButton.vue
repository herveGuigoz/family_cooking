<template>
  <div class="floating-menu_wrapper h-64 w-24 flex flex-col">
    <transition name="fade">
      <div
        v-if="menuIsVisible"
        class="floating-menu_overlay bg-red-500"
      >
      </div>
    </transition>
    <button
      @click="toggleMenu"
      class="floating-menu_button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      >
      <span class="-visually-hidden">click me</span>
    </button>
    <a 
      v-for="(item, index) in childButtons"
      :key="item.text"
      :href="item.link"
      class="floating-menu_child"
      :style="calculateButtinStyle(index)"
      >
        <img :src="item.icon" class="floating-menu_child-img" alt="itemIcon">
    </a>

  </div>
</template>
  
<script>
export default {
  data: () => ({
    menuIsVisible: false,
    childButtons: [
      {
        text: 'Example Link!',
        link: 'https://some.link',
        icon: require('~/assets/icons/profile.svg')
      },
      {
        text: 'Example Link 2!',
        link: 'https://another.link',
        icon: require('~/assets/icons/edit-profile.svg')
      },
      {
        text: 'Example Link!',
        link: 'https://some.link',
        icon: require('~/assets/icons/profile.svg')
      }
    ]
  }),
  methods: {
    toggleMenu() {
      this.menuIsVisible = !this.menuIsVisible
    },
    calculateButtinStyle(index) {
      return {
        'bottom': `${this.menuIsVisible ? (index + 1.3) * 50 : 0}px`,
        'transition-delay': `${index * .1}s`,
        'transform': `scale(${this.menuIsVisible ? 1 : .5})`,
      }
    }
  }
}
</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity .5s ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
</style>