<template>
  <div
    class="w-full bg-gray-200 h-2 relative overflow-hidden"
    :class="[{'rounded-full': rounded}, { indeterminate: indeterminate}, { back: back }]"
  >
    <div
      class="h-full progressbar"
      :class="[`bg-${color}-500`, {'absolute top-0': indeterminate}, {'rounded-full': rounded}]"
      role="progressbar"
      :style="{width: `${percentage}%`}"
      :aria-valuenow="percentage"
      aria-valuemin="0"
      aria-valuemax="100"
    >
      <span class="flex items-center h-full">
        <slot />
      </span>
    </div>
  </div>
</template>
<script>
export default {
  inheritAttrs: false,
  props: {
    color: {
      type: String,
      default: 'teal'
    },
    percentage: {
      type: Number,
      default: 0
    },
    rounded: {
      type: Boolean,
      default: true
    },
    indeterminate: Boolean,
    back: Boolean,
    duration: {
      type: Number,
      default: 0
    }
  }
}
</script>
<style scoped>
  @keyframes progress-indeterminate {
    0% {
      width: 30%;
      left: -40%;
    }
    60% {
      left: 100%;
      width: 100%;
    }
    to {
      left: 100%;
      width: 0;
    }
  }
  @keyframes progress-back {
    0% {
      width: 100%;
    }
    to {
      width: 0;
    }
  }
  .progressbar {
    transition: width 0.25s ease;
  }
  .indeterminate .progressbar {
    animation: progress-indeterminate 1.4s ease infinite;
  }
  .back .progressbar {
    animation: progress-back 3000ms ease; /* TODO : move to style */
    animation-delay: 0.25s;
  }
</style>
