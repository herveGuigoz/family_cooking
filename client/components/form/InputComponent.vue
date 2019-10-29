<template>
  <div class="w-full px-3 mb-3">
    <label
      class="block uppercase tracking-wide text-xs font-bold text-brown mb-2"
      :for="id"
    >{{ label }}</label>
    <input
      :id="id"
      v-model="handleInput"
      :type="type"
      :class="{ 'border border-teal-400' : v.$dirty && !v.$invalid, 'border border-red-200' : error }"
      class="border border-gray-300 appearance-none block w-full bg-white text-gray-900 rounded py-2 px-4 mb-3 leading-tight focus:outline-none"
      :disabled="disabled"
    >
    <div class="mb-3">
      <p v-if="error" class="text-red-400 text-xs">
        ❗{{ error }}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'InputComponent',
  props: {
    value: {
      type: String,
      default: ''
    },
    error: {
      type: String,
      default: ''
    },
    v: {
      type: Object,
      required: true
    },
    type: {
      type: String,
      default: 'text'
    },
    id: {
      type: String,
      required: true
    },
    label: {
      type: String,
      required: true
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    handleInput: {
      get () {
        return this.value
      },
      set (value) {
        this.v.$touch()
        this.$emit('input', value)
      }
    }
  }
}
</script>
