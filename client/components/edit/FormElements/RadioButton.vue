<template>
  <div class="h-full">
    <div class="mb-4">
      <div class="block flex text-teal-500 text-3xl font-bold mb-2">
        <span class="ml-2">{{ message }}</span>
      </div>
    </div>
    <div v-for="(option, key) in options" :key="key" class="flex items-center mr-4 mb-4">
      <input
        :id="`radio${key}`"
        name="radio"
        type="radio"
        :value="option"
        @input="$emit('handleAnswer', $event.target.value)"
        :checked="option === value"
        class="hidden"
      />
      <label :for="`radio${key}`" class="flex items-center cursor-pointer text-xl text-gray-700">
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
      value: {
        type: String,
        required: true
      },
      options: {
        type: Array,
        required: true
      }
    }
  }
</script>

<style scoped>
  input[type="radio"] + label span {
    transition: background .2s,
    transform .2s;
  }
  input[type="radio"] + label span:hover,
  input[type="radio"] + label:hover span{
    transform: scale(1.2);
  }
  /* Radio background color */
  input[type="radio"]:checked + label span {
    background-color: #2c5282;
    box-shadow: 0px 0px 0px 2px white inset;
  }
  /* Text colot */
  input[type="radio"]:checked + label{
    color: #2c5282;
  }
</style>
