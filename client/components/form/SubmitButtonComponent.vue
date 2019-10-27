<template>
  <button
    class="bg-transparent hover:bg-gray-900 text-gray-900 hover:text-gray-800 py-2 px-4 border border-gray-900 hover:border-gray-800 rounded"
    type="submit"
  >
    <!-- Named slot | verifier mr-3 -->
    <slot v-if="icon" name="icon" class="mr-3"></slot>
    {{ text }}
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

