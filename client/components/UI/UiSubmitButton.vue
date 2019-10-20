<template>
  <button
    class="flex flex-no-wrap items-center rounded h-10 px-3"
    :class="bgColor"
    type="submit"
  >
    <!-- Named slot | verifier mr-3 -->
    <slot v-if="icon" name="icon" class="mr-3"></slot>
    <span
      :class="textColor"
    >{{ text }}</span>
  </button>
</template>

<script>
  export default {
    name: "UiSubmitButton",
    props: {
      text: {
        type: String,
        required: false,
        default: ''
      },
      bgColor: {
        type: String,
        required: false,
        default: 'bg-beige'
      },
      textColor: {
        type: String,
        required: false,
        default: 'text-brown'
      },
      icon: {
        type: String,
        required: false,
        default: null
      }
    },
    data: () => ({}),
    methods: {
      handleAction() {
        return null // TODO
      }
    }
  }
</script>

