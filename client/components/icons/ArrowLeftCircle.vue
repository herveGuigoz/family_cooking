<template>
  <svg role="img"
       :class="[height, width]"
       xmlns="http://www.w3.org/2000/svg"
       viewBox="0 0 24 24"
       aria-labelledby="circleArrowLeftIconTitle"
       :stroke="color"
       stroke-width="1"
       stroke-linecap="square"
       stroke-linejoin="miter"
       fill="none"
       :color="color">
    <title id="circleArrowLeftIconTitle">
      Arrow Left
    </title>
    <path d="M10.5 15l-3-3 3-3"/>
    <path d="M16.5 12H9"/>
    <path stroke-linecap="round" d="M7.5 12H9"/>
    <circle cx="12" cy="12" r="10"/>
  </svg>
</template>

<script>
  export default {
    name: 'ArrowLeftCircle',
    props: {
      width: {
        type: String,
        default: 'w-9'
      },
      height: {
        type: String,
        default: 'h-9'
      },
      color: {
        type: String,
        default: '#00d1b2'
      }
    }
  }
</script>
