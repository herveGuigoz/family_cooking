<template>
  <div class="w-full px-3 mb-3">
    <label
      class="block uppercase tracking-wide text-xs font-bold text-brown mb-2"
      :for="id"
    >{{ inputLabel }}</label>
    <input
      v-model="userInput"
      :class="{ 'border border-red-500': submitting && validInput }"
      class="appearance-none block w-full bg-white text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none"
      :id="id"
      :type="inputType"
      :required="required"
    />
    <div class="px-3 mb-1">
      <p v-if="error" class="text-red-500 text-xs">❗ {{ errorMessage }}</p>
    </div>
  </div>
</template>

<script>
  export default {
    name: "UI-Input",
    props: {
      id: {
        type: String,
        required: true
      },
      inputLabel: {
        type: String,
        required: true
      },
      inputType: {
        type: String,
        required: true
      },
      required: {
        type: Boolean,
        required: true
      },
      regex: {
        type: String,
        required: false,
        default: '/[^\\w|_|-]/'
      },
      errorMessage: {
        type: String,
        required: false,
        default: ''
      }
    },
    data: () => ({
      userInput: '',
      error: false
    }),
    computed: {
      submitting () {
        return this.userInput.length > 0
      },
      validInput () {
        return false// TODO
      }
    }
  }
</script>
