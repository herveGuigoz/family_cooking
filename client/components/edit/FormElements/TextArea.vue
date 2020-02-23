<template>
  <div class="h-full">
    <div class="mb-4">
      <label class="block flex text-teal-500 text-3xl font-bold mb-2" for="input">
        <span class="ml-2">{{ message }}</span>
      </label>
    </div>
    <textarea
      v-focus
      class="resize-none h-full bg-transparent text-4xl appearance-none text-blue-800 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
      id="input"
      :value="value"
      ref="input"
      @input="$emit('handleAnswer', $event.target.value)"
    />
  </div>
</template>

<script>
  export default {
    props: {
      type: {
        type: String,
        required: true
      },
      message: {
        type: String,
        required: true
      },
      value: {
        type: String,
        required: true
      }
    },
    directives: {
      focus: {
        inserted: (el) => el.focus()
      }
    }
  }
</script>
<style scoped>
  .slide-up-enter-active {
    transition: all .3s ease;
  }
  .slide-up-leave-active {
    transition: all .3s ease;
  }
  .slide-up-enter, .slide-up-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
    transform: translateY(200px);
    opacity: 0;
  }
</style>
