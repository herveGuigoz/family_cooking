<template>
  <div class="h-full">
    <div class="mb-4">
      <div class="block flex text-teal-500 text-3xl font-bold mb-2">
        <span class="ml-2">{{ message }}</span>
      </div>
    </div>
    <div v-for="(option, key) in options" :key="key" class="flex items-center mr-4 mb-4">
      <input
        type="checkbox"
        :value="option"
        :id="option"
        v-model="selectedValues"
        v-checked:[option]="selectedValues"
        class="hidden"
      />
      <label :for="option" class="flex items-center cursor-pointer text-xl text-gray-700">
        <span class="w-4 h-4 inline-block ml-4 mr-2 border border-grey"></span>
        {{ option }}
      </label>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      message: {
        type: String,
        required: true
      },
      options: {
        required: true
      },
      value: {
        required: false,
        default: () => []
      }
    },
    data() {
      return {
        selectedValues: []
      }
    },
    watch: {
      selectedValues(newVal) {
        this.$emit("handleAnswer", newVal)
      }
    },
    created() {
      if (this.value.length > 0) this.selectedValues = this.value
    },
    directives: {
      checked(el, binding) {
        return binding.value.includes(binding.arg) ? (el.checked = true) : (el.checked = false)
      }
    }
  }
</script>
<style>
  label {
    display: block;
  }
  input[type="checkbox"] + label span {
    transition: background .2s,
    transform .2s;
  }
  input[type="checkbox"] + label span:hover,
  input[type="checkbox"] + label:hover span{
    transform: scale(1.2);
  }
  /* Radio background color */
  input[type="checkbox"]:checked + label span {
    background-color: #2c5282;
    box-shadow: 0px 0px 0px 2px white inset;
  }
  /* Text colot */
  input[type="checkbox"]:checked + label{
    color: #2c5282;
  }
</style>
