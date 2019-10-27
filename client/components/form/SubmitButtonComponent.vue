<template>
  <button
    class="block border-2 hover:border-teal-500 py-2 px-4 rounded opacity-50 bg-teal-500 focus:outline-none focus:border-grey"
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

