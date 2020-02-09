<template>
  <svg role="img"
    :class="[height, width]"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    aria-labelledby="circleArrowRightIconTitle"
    stroke="#00d1b2" 
    stroke-width="1" 
    stroke-linecap="square" 
    stroke-linejoin="miter" 
    fill="none" 
    color="#00d1b2"
  > 
    <title id="circleArrowRightIconTitle">
      Arrow Right
    </title> 
    <path d="M13.5 9l3 3-3 3"/> 
    <path d="M7.5 12H15"/> 
    <path stroke-linecap="round" d="M16.5 12H15"/> 
    <circle cx="12" cy="12" r="10"/> 
  </svg>
</template>

<script>
export default {
  name: 'ArrowRightCircle',
  props: {
    width: {
      type: String,
      default: 'w-9'
    },
    height: {
      type: String,
      default: 'h-9'
    }
  }
}
</script>