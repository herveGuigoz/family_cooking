<template>
  <nuxt-link :to="link">
    <div
      class="block flex flex-no-wrap items-center rounded h-10 my-2 px-3"
      :class="bgColor"
    >
      <slot></slot>
      <span
        class="pl-3"
        :class="textColor"
      >{{ text }}</span>
    </div>
  </nuxt-link>
</template>

<script>
  export default {
    props: {
      text: {
        required: true,
        type: String
      },
      link: {
        required: true,
        type: String
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
    }
  }
</script>
