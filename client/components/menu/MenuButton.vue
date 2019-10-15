<template>
  <nuxt-link :to="link">
    <div
      class="bg-beige text-brown text-beige flex flex-no-wrap items-center rounded h-10 px-3"
    >
      <slot></slot>
      <span class="pl-3 text-brown">{{ text }}</span>
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
    }
  }
}
</script>
