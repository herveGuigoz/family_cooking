<template>
  <div class="w-full px-3 mb-3">
    <label
      class="block uppercase tracking-wide text-xs font-bold text-brown mb-2"
      :for="id"
    >{{ label }}</label>
    <input
      :class="{ 'border border-red-500': errorMessage }"
      class="appearance-none block w-full bg-white text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none"
      :type="type"
      :disabled="disabled"
      :required="required"
      @input="updateValue($event)"
    />
    <div class="px-3 mb-1">
      <p v-if="errorMessage" class="text-red-500 text-xs">❗ {{ errorMessage }}</p>
    </div>
  </div>
</template>

<script>
  export default {
    name: "UI-Input",
    props: {
      label: {
        type: String,
        required: true
      },
      id: {
        type: String,
        required: true
      },
      disabled: {
        type: Boolean,
        default: false
      },
      required: {
        type: Boolean,
        default: false
      },
      type: {
        type: String,
        default: 'text',
      },
      errorMessage: {
        type: String,
        default: null,
      }
    },
    methods: {
      updateValue (e) {
        this.$emit('update', e.target.value);
      }
    }
  }
</script>
