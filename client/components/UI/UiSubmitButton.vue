<template>
  <button
    class="flex flex-no-wrap items-center rounded h-10 px-3"
    :class="bgColor"
    type="submit"
  >
    <slot></slot>
    <span
      class="pl-3"
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

